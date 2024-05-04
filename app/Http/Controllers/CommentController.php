<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $formFields = $request->validate([
            'listing_id' => 'required',
            'content' => 'required',
        ]);
        $formFields['user_id'] = auth()->id();
        if($request->has('parent_id')){
            $formFields['parent_id'] = $request->parent_id;
        }
        Comment::create($formFields);        
        return redirect('/');
    }

}
