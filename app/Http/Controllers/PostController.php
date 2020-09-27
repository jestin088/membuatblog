<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('post.index', compact('posts'));
    }

    public function show($slug)
    {

        $post = Post::where('slug', $slug)->first();
        if ($post == null)
            abort(401);

        return view('post.single', compact('post'));
    }
    public function create()
    {

        return view('post.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'thumbnail' => 'mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required|max:255|min:10',
            'body' => 'required|min:20',
        ]);
        $imgName = null;
        if ($request->thumbnail) {

            $imgName = $request->thumbnail->getClientOriginalName() . '-' . time()
                . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('image'), $imgName);
        }
        //dd($request);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'body' => $request->body,
            'thumbnail' => $imgName
        ]);

        return redirect('/post');
    }
    public function edit($id)
    {
        $post = post::find($id);
        return view('post.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255|min:10',
            'body' => 'required|min:20',
        ]);

        $imgName = null;
        if ($request->thumbnail) {
            $imgName = $request->thumbnail->getClientOriginalName() . '-' . time()
                . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('image'), $imgName);
        }

        $post = post::find($id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'thumbnail' => $imgName

        ]);

        return redirect('/post');
    }
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect('/post');
    }
}
