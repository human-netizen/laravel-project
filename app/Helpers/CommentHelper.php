<?php

namespace App\Helpers;

use App\Models\User;

class CommentHelper
{
    public static function commentMakerFun($comment){
        $user = User::find($comment->user_id);
        $src = $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://rvs-comment-module.vercel.app/Assets/Profile.svg';
        $html = '
            
                <div class="comment">
                    <div class="comment-img">
                        <img src = '.$src.' alt="">
                    </div>
                    <div class="comment-content">
                        <div class="comment-details">
                            <h4 class="comment-name">'.$user->name .'</h4>
                            <span class="comment-log">' .$comment->created_at->toDateString() .'</span>
                        </div>
                        <div class="comment-desc">
                            <p>'. htmlspecialchars($comment->content) .'</p>
                        </div>
                        <div class="comment-data">
                            <div class="comment-likes">
                                <div class="comment-likes-up">
                                    <img src="https://rvs-comment-module.vercel.app/Assets/Up.svg" alt="">
                                    <span></span>
                                </div>
                                <div class="comment-likes-down">
                                    <img src="https://rvs-comment-module.vercel.app/Assets/Down.svg" alt="">
                                    <span></span>
                                </div>
                            </div>
                            <div>
                                <button class="comment-reply" id="' .$comment->id. 'commentBtn"> Reply</button>
                            </div>
                            <div class="comment-report">
                                <a href="#!">Report</a>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            ';
            return $html;
       
    
    }

    
    public static function rec($comment , $listing){
        
        $curr = '<li class="commentli">' . self::commentMakerFun($comment);
        $curr .= '<ul>';
        $curr .= '<form method="POST" action="/commentStore" class="reply-elem w-full">';
        $curr .= csrf_field();
    $curr .= '
    <div class = "own-comment w-full">
        <p1>Write a Comment</p1><br>
        <div class="comment-flex">
            <textarea name="content" rows="4" class="flex-comment-text"></textarea>
            <input type="hidden" name="listing_id" value="'.$listing->id.'">
            <input type="hidden" name="parent_id" value="'.$comment->id.'">
            <button id="myButton" class="flex-comment-button">Comment</button>
        </div>
    </div>
</form>';

        if($comment->subcomments->isNotEmpty()){            
                $subcomments = $comment->subcomments;
                foreach($subcomments as $subcomment) {
                    $curr .= self::rec($subcomment , $listing);
                }
            }
            $curr .= '</ul>';
        $curr .= '</li>';
        return $curr;
    }
    public static function closeUnclosedTags($html)
{
    // Match all HTML tags
    preg_match_all('/<([a-z]+)(?: .*)?(?<![\/|\/ ])>/', $html, $openTags);
    preg_match_all('/<\/([a-z]+)>/', $html, $closeTags);

    // Extract tags from matches
    $openTags = $openTags[1];
    $closeTags = $closeTags[1];

    // Use a stack to keep track of open tags
    $stack = [];

    // Track open tags
    foreach ($openTags as $tag) {
        $stack[] = $tag;
    }

    // Remove closed tags from stack
    foreach ($closeTags as $tag) {
        $pos = array_search($tag, $stack);
        if ($pos !== false) {
            unset($stack[$pos]);
        }
    }

    // Add missing closing tags
    while (!empty($stack)) {
        $tag = array_pop($stack);
        $html .= "</$tag>";
    }

    return $html;
}
}
