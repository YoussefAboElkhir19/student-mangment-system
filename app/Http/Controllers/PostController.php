<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $postFromdb = Post::all(); // collection of objects
        // dd($postFromdb);

        return view('posts.index', ['posts' => $postFromdb]);
    }
    public function show($postid)
    {
        $singlePostdb = Post::find($postid);
        // dd($singlePostdb);
        // Get one Element By Id
        // OR   $singlePostdb = Post::where('id' , $postid)->first();
        // When Serach By Title in DB
        // OR $singlePostdb = Post::where('title' , PHP)->get();
        // if not exist a Id IN DB Can use  finorFail() Method
        // OR $singlePostdb = Post::findOrFail($postid);
        if (is_null($singlePostdb)) {
            return redirect()->route('posts.index');
        }


        return  view('posts.show', ['onePost' => $singlePostdb]);
    }
    public function create()
    {
        $userFromdb = User::all();
        // dd($userFromdb);


        return view('posts.create', ['users' => $userFromdb]);
    }


    public function store()
    {
        // validate data input
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'posted_by' => ['required', 'exists:users,id']
        ]);
        // 1- get user data
        // $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $posted_by = request()->posted_by;
        // dd($description, $posted_by);
        // dd($title, $description, $posted_by);

        // 2- store data in DB
        // create new object
        // $post = new post;
        // $post->title = $title;
        // $post->description = $description;
        // $post->save();
        // OR
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $posted_by,
        ]);

        // 3- redirect to index page
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    // using Route Model Binding Post $post select a Data post
    {

        // dd($post);
        $userFromdb = User::all();
        // dd($userFromdb);


        return view('posts.edit', ['users' => $userFromdb, 'post' => $post]);
    }
    public function update($postid)
    {
        // validate data
        request()->validate([
            'title' => ['min:3'],
            'description' => ['min:10'],
            'posted_by' => ['exists:users,id']
        ]);
        // 1- get user data
        $title = request()->title;
        $description = request()->description;
        $posted_by = request()->posted_by;
        // dd($title, $description, $posted_by);
        // 2- update data in DB
        // select post by id
        $singlePost = Post::find($postid);
        // dd($singlePost);
        // update  post data
        $singlePost->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $posted_by

        ]);

        return redirect()->route('posts.show', $postid);
    }
    public function destory($postid)
    {
        // dd($postid);
        // delete post from DB
        // select post needed to delete by id
        $singlePost = Post::find($postid);
        // delete post
        $singlePost->delete();

        // redirect to index page
        return redirect()->route('posts.index');
    }
}
