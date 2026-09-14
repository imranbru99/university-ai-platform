<?php

namespace App\Http\Controllers;

use App\Constants\Status;
use App\Models\AdminNotification;
use App\Models\Post;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $pageTitle = 'Home';
        $posts = Post::latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'home', compact('pageTitle', 'posts'));
    }

    public function feed()
    {
        $posts = Post::latest()->get();
        return response()->view($this->activeTemplate .'rss', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function blog()
    {
        $pageTitle = 'Blog';
        $posts = Post::latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'blog.blogs', compact('pageTitle', 'posts'));
    }

    public function contact()
    {
        $pageTitle = "Contact Us";
        return view($this->activeTemplate . 'contact', compact('pageTitle'));
    }

    public function privacy()
    {
        $pageTitle = "Privacy Policy";
        return view($this->activeTemplate . 'privacy', compact('pageTitle'));
    }

    public function terms()
    {
        $pageTitle = "Terms and Condition";
        return view($this->activeTemplate . 'terms', compact('pageTitle'));
    }

    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        if (!verifyCaptcha()) {
            $notify[] = ['error', 'Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        $request->session()->regenerateToken();

        $random = getNumber();

        $ticket           = new SupportTicket();
        $ticket->user_id  = auth()->id() ?? 0;
        $ticket->name     = $request->name;
        $ticket->email    = $request->email;
        $ticket->priority = Status::PRIORITY_MEDIUM;

        $ticket->ticket     = $random;
        $ticket->subject    = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status     = Status::TICKET_OPEN;
        $ticket->save();

        $adminNotification            = new AdminNotification();
        $adminNotification->user_id   = auth()->user() ? auth()->user()->id : 0;
        $adminNotification->title     = 'A new support ticket has opened ';
        $adminNotification->click_url = urlPath('admin.ticket.view', $ticket->id);
        $adminNotification->save();

        $message                    = new SupportMessage();
        $message->support_ticket_id = $ticket->id;
        $message->message           = $request->message;
        $message->save();

        $notify[] = ['success', 'Ticket created successfully!'];

        return to_route('ticket.view', [$ticket->ticket])->withNotify($notify);
    }


    public function about()
    {
        $pageTitle = 'About';
        return view($this->activeTemplate . 'about', compact('pageTitle'));
    }

    public function placeholderImage($size = null)
    {
        $imgWidth  = explode('x', $size)[0];
        $imgHeight = explode('x', $size)[1];
        $text      = $imgWidth . '×' . $imgHeight;
        $fontFile  = realpath('assets/font/RobotoMono-Regular.ttf');
        $fontSize  = round(($imgWidth - 50) / 8);

        if ($fontSize <= 9) {
            $fontSize = 9;
        }

        if ($imgHeight < 100 && $fontSize > 30) {
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox    = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    public function sitemap()
    {
        $post = Post::orderBy('updated_at', 'desc')->get();
        return response()->view($this->activeTemplate .'sitemap', [
            'posts' => $post,
        ])->header('Content-Type', 'text/xml');
    }


    public function postDetails($slug)
    {
        $post      = Post::where('slug', $slug)->first();
        if ($post) {
            $count = $post->view;
            $post->view = $count + 1;
            $post->save();
            $latests = Post::latest()->get()->take(5);
            $tags=$post->tags;
            $pageTitle = $post->title;
            return view($this->activeTemplate . 'post.details', compact('post', 'pageTitle', 'latests'));
        } else {
            
            $relatedSlug = Post::where('slug', 'like', '%' . $slug . '%')->first();
            if ($relatedSlug) {
                return redirect()->route('postDetails', $relatedSlug->slug);
            } else {
                abort(404);
            }
        }
    }
}