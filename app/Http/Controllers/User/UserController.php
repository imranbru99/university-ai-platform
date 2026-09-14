<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Lib\FormProcessor;
use App\Lib\GoogleAuthenticator;
use App\Models\Form;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use OpenAI;
use Sohibd\Laravelslug\Generate;

class UserController extends Controller
{
    public function home()
    {
        $pageTitle = 'Dashboard';
        $post = Post::count();
        $my = Post::where('user_id', auth()->id())->count();
        $user = auth()->user();

        return view($this->activeTemplate . 'user.dashboard', compact('pageTitle', 'post', 'user', 'my'));
    }

    public function depositHistory(Request $request)
    {
        $pageTitle = 'Deposit History';
        $deposits = auth()->user()->deposits()->searchable(['trx'])->with(['gateway'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.deposit_history', compact('pageTitle', 'deposits'));
    }

    public function show2faForm()
    {
        $general = gs();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $general->site_name, $secret);
        $pageTitle = '2FA Setting';
        return view($this->activeTemplate . 'user.twofactor', compact('pageTitle', 'secret', 'qrCodeUrl'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $response = verifyG2fa($user, $request->code, $request->key);

        if ($response) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->save();
            $notify[] = ['success', 'Google authenticator activated successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong verification code'];
            return back()->withNotify($notify);
        }
    }

    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $response = verifyG2fa($user, $request->code);

        if ($response) {
            $user->tsc = null;
            $user->ts = 0;
            $user->save();
            $notify[] = ['success', 'Two factor authenticator deactivated successfully'];
        } else {
            $notify[] = ['error', 'Wrong verification code'];
        }

        return back()->withNotify($notify);
    }

    public function transactions(Request $request)
    {
        $pageTitle = 'Transactions';
        $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');
        $transactions = Transaction::where('user_id', auth()->id())->searchable(['trx'])->filter(['trx_type', 'remark'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.transactions', compact('pageTitle', 'transactions', 'remarks'));
    }

    public function kycForm()
    {

        if (auth()->user()->kv == 2) {
            $notify[] = ['error', 'Your KYC is under review'];
            return to_route('user.home')->withNotify($notify);
        }

        if (auth()->user()->kv == 1) {
            $notify[] = ['error', 'You are already KYC verified'];
            return to_route('user.home')->withNotify($notify);
        }

        $pageTitle = 'KYC Form';
        $form = Form::where('act', 'kyc')->first();
        return view($this->activeTemplate . 'user.kyc.form', compact('pageTitle', 'form'));
    }

    public function kycData()
    {
        $user = auth()->user();
        $pageTitle = 'KYC Data';
        return view($this->activeTemplate . 'user.kyc.info', compact('pageTitle', 'user'));
    }

    public function kycSubmit(Request $request)
    {
        $form = Form::where('act', 'kyc')->first();
        $formData = $form->form_data;
        $formProcessor = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);
        $request->validate($validationRule);
        $userData = $formProcessor->processFormData($request, $formData);
        $user = auth()->user();
        $user->kyc_data = $userData;
        $user->kv = 2;
        $user->save();

        $notify[] = ['success', 'KYC data submitted successfully'];
        return to_route('user.home')->withNotify($notify);
    }

    public function attachmentDownload($fileHash)
    {
        $filePath = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $general = gs();
        $title = slug($general->site_name) . '- attachments.' . $extension;
        $mimetype = mime_content_type($filePath);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }

    public function userData()
    {
        $user = auth()->user();

        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }

        $pageTitle = 'User Data';
        return view($this->activeTemplate . 'user.user_data', compact('pageTitle', 'user'));
    }

    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();

        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->education = $request->education;
        $user->skill = $request->skill;
        $user->about = $request->about;
        $user->address = [
            'country' => @$user->address->country,
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'city' => $request->city,
        ];
        $user->profile_complete = 1;
        $user->save();

        $notify[] = ['success', 'Registration process completed successfully'];
        return to_route('user.home')->withNotify($notify);
    }

    public function ai()
    {
        $pageTitle = 'Ai Content Writer';
        return view($this->activeTemplate . 'user.post.generate', compact('pageTitle'));
    }

    public function generate(Request $request)
    {

        $request->validate([
            'keyword' => 'required|string|max:1000',
            'size' => Rule::in(['sm', 'md', 'lg']),
        ]);

        $keyword = $request->keyword;

        switch ($request->size) {
            case 'md':
                $size = '512x512';
                break;
            case 'sm':
                $size = '256x256';
                break;
            default:
                $size = '1024x1024';
        };

        $api = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($api);

        $key = "Generate SEO BASE Title about Review of {$keyword} ";
        $start = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $key,
            'max_tokens' => 1024,
        ]);

        $little = $start['choices'][0]['text'];
        $title = str_replace('"', '', $little);

        $try = "Generate intro short description about {$keyword} where sentence start with {$title}. below the paragraph give two <br> tag";
        $start = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $try,
            'max_tokens' => 1024,
        ]);

        $bodyTry = $start['choices'][0]['text'];

        $what = "World Ranking of  {$keyword} last 5 years. Subheadings should be <h2> yellow background tags and every subheading paragraph must be minimum 100 words. Every paragraph to subheading give a <br> tag. No need any conclusion sentence. ";
        $which = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $what,
            'max_tokens' => 1024,
        ]);
        $why = $which['choices'][0]['text'];

        $love = "Location and Map of  {$keyword} . Subheadings should be <h2> yellow background tags and every subheading paragraph must be minimum 100 words. Every paragraph to subheading give a <br> tag. Must Start without Any Introduction Heading . No need any conclusion sentence. ";
        $tech = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $love,
            'max_tokens' => 1024,
        ]);
        $and = $tech['choices'][0]['text'];

        $made = "History of the {$keyword} . Subheadings should be <h2> yellow background tags and every subheading paragraph must be minimum 100 words. Every paragraph to subheading give a <br> tag. Must Start without Any Introduction Heading . No need any conclusion sentence. ";
        $stop = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $made,
            'max_tokens' => 1024,
        ]);
        $exam = $stop['choices'][0]['text'];

        $support = "All Academic Programs of {$keyword} . Subheadings should be <h2> yellow background tags and every subheading paragraph must be minimum 100 words. Every paragraph to subheading give a <br> tag. Must Start without Any Introduction Heading . No need any conclusion sentence. ";
        $science = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $support,
            'max_tokens' => 1024,
        ]);
        $info = $science['choices'][0]['text'];

        $home = "Students Opportunity of {$keyword} with Application Process. Subheadings should be <h2> yellow background tags and every subheading paragraph must be minimum 100 words. Every paragraph to subheading give a <br> tag. Must Start without Any Introduction Heading . No need any conclusion sentence. ";
        $review = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $home,
            'max_tokens' => 1024,
        ]);
        $faq = $review['choices'][0]['text'];

        $prompt = "Generate Post body for importance of {$keyword} where repeated more than 10% used repeat actual {$title} in the paragraph. Subheadings should be <h2> yellow background tags and every subheading paragraph must be minimum 100 words. Must Start without Any Introduction Heading . No need any conclusion sentence. ";
        $content = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 1024,
        ]);
        $bodyStart = $content['choices'][0]['text'];

        $conclusion = "Generate Career Opportunities for this {$keyword} . Subheadings should be <h2> yellow background tags and every subheading paragraph must be minimum 100 words. Must Start without Any Introduction Heading .  Conclusion will be show as subheading and well finished ";

        $last = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $conclusion,
            'max_tokens' => 1024,
        ]);

        $bodyLast = $last['choices'][0]['text'];

        $text = "Generate an image related to the university of : {$keyword}. which looking perfect with Good Background. Must be No Text in image";
        $imageLink = $client->images()->create([
            'prompt' => $text,
            'n' => 1,
            'size' => $size,
            'response_format' => 'url',
        ]);
        $imageUrl = $imageLink->data[0]->url;
        $imageData = file_get_contents($imageUrl);
        $imageName = Str::random(20) . '.jpg';
        $path = './assets/images/post/' . date("Y") . '/' . date("m") . '/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $location = 'assets/images/post/' . date("Y") . '/' . date("m") . '/' . $imageName;
        $image = Image::make($imageData);

        $image->save($location);

        $within = "Generate an image related to the {$keyword}. which looking perfect with Good Background. Must be No Text in image";
        $each = $client->images()->create([
            'prompt' => $within,
            'n' => 1,
            'size' => $size,
            'response_format' => 'url',
        ]);
        $img = $each->data[0]->url;
        $imgData = file_get_contents($img);
        $imgName = Str::random(20) . '.jpg';
        $path = './assets/images/post/' . date("Y") . '/' . date("m") . '/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $lcd = 'assets/images/post/' . date("Y") . '/' . date("m") . '/' . $imgName;
        $make = Image::make($imgData);
        $make->save($lcd);

        $container = "Generate an image related to the {$keyword}. which looking perfect with Good Background. Must be No Text in image";
        $did = $client->images()->create([
            'prompt' => $container,
            'n' => 1,
            'size' => $size,
            'response_format' => 'url',
        ]);
        $society = $did->data[0]->url;
        $social = file_get_contents($society);
        $the = Str::random(20) . '.jpg';
        $path = './assets/images/post/' . date("Y") . '/' . date("m") . '/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $risk = 'assets/images/post/' . date("Y") . '/' . date("m") . '/' . $the;
        $power = Image::make($social);
        $power->save($risk);

        $user = Auth::user();
        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $title;
        $post->slug = Generate::Slug($title);
        $post->description = $title . $bodyTry . '<br><br>' . $why . '<br><br>' . $and . '<br><br>' . '<img src="' . url($lcd) . '">' . '<br><br>' . $exam . '<br><br>' . $info . '<br><br>' . $faq . '<br><br>' . '<img src="' . url($risk) . '">' . '<br><br>' . $bodyStart . '<br><br>' . $bodyLast;
        $post->image = $location;
        $post->save();

        $request = request();
        foreach ($request->tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Generate::Slug($tag);
            $newTag->save();

            $tag = new PostTag();
            $tag->post_id = $post->id;
            $tag->tag_id = $newTag->id;
            $tag->save();
        }

        $notify[] = ['success', 'Your Post Saved successfully.'];
        return redirect()->route('user.ai.posts')->withNotify($notify);

    }

    public function postIndex()
    {
        $pageTitle = 'Your Content';
        $posts = Post::where('user_id', auth()->id())->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.post.index', compact('pageTitle', 'posts'));
    }

    public function chat()
    {
        $pageTitle = 'Ai Chat';
        return view($this->activeTemplate . 'user.chat.chat', compact('pageTitle'));
    }

    public function getChatbotResponse(Request $request)
    {
        // Get the user input from the request
        $input = $request->input('input');

        // Send the user input to the ChatGPT API and get a response
        $response = $this->sendToChatGPT($input);

        // Return the response as JSON
        return response()->json(['response' => $response]);
    }

    private function sendToChatGPT($input)
    {
        // Set up the ChatGPT API endpoint and parameters
        $url = 'https://api.openai.com/v1/engines/davinci-codex/completions';
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . getenv('OPENAI_API_KEY'),
        ];
        $data = [
            'prompt' => $input,
            'temperature' => 0.5,
            'max_tokens' => 50,
            'top_p' => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ];

        // Send the request to the ChatGPT API and parse the response
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result, true);

        // Extract the completed text from the response
        $text = $response['choices'][0]['text'];

        return $text;
    }

}
