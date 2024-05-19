<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\PostCreated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showForm(){
        return view('userPost');
    }
    public function save(Request $request){
        $post_data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required'
        ]);
        $data = [
            'title' => $post_data['title'],
            'author' => $post_data['author'],
            'content' => $post_data['content']
        ];
        Post::create($data);
        event(new PostCreated($data));
        return redirect()->back()->with('message' , 'Post Created Successfully');
    }
}
