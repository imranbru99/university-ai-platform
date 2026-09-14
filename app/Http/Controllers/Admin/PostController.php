<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Sohibd\Laravelslug\Generate;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    
    public function index()
    {
        $pageTitle = 'Post All';
        $posts   = Post::latest()->paginate(getPaginate());
        $admin = auth('admin')->user();
        return view('admin.post.index', compact('pageTitle', 'admin', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $pageTitle = 'Edit Post';
        return view('admin.post.edit', compact('pageTitle','post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = Generate::Slug($post->title);
        $post->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $post->slug . '.jpg';
            $currentMonth = date('m');
            $currentYear = date('Y');
            $location = 'assets/images/post/' . date("Y") . '/' . date("m") . '/'. $filename;
            $post->image = $location;
            $path = './assets/images/post/' . date("Y") . '/' . date("m") . '/';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $link = $path . $post->image;
            if (file_exists($link)) {
                @unlink($link);
            }
            Image::make($image)->save($location);
        }

        $path = './assets/images/post/' . date("Y") . '/' . date("m") . '/';
        $post->save();

        $notify[] = ['success', 'Your Post Updated successfully.'];
        return redirect()->route('admin.post.index')->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
