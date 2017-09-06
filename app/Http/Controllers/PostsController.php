<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use URL;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'dasc')->paginate(25);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // handle file upload
        if ( $request->hasFile('cover_image') ) {
            // get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just ext
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $ext;
            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpeg';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
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
        // check if user has permission to edit
        if ( auth()->user()->id !== $post->user_id ) {
            return redirect('/posts')->with('error', 'You do not have permissions to modify a post you did not write.');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // handle file upload
        if ( $request->hasFile('cover_image') ) {
            // get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just ext
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $ext;
            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ( $request->hasFile('cover_image') ) {
          Storage::delete('public/cover_images/' . $post->cover_image);
          $post->cover_image = $filenameToStore;
        }
        $post->save();

        return redirect()->route('posts.show', ['id' => $id])->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // check if user has permission to delete
        if ( auth()->user()->id !== $post->user_id ) {
            return redirect('/posts')->with('error', 'You cannot delete someone else\'s post!');
        }

        // remove associated cover image from storage
        if ( $post->cover_image != 'noimage.jpeg' ) {
          Storage::delete('public/cover_images/' . $post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted successfully');
    }
}
