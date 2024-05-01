<?php

namespace App\Helpers;

use App\Models\User;

class CommentHelper
{
    public static function commentMakerFun($comment){
        $user = User::find($comment->user_id);
        $html = '
            
                <div class="comment">
                    <div class="comment-img">
                        <img src="https://rvs-comment-module.vercel.app/Assets/User Avatar.png" alt="">
                    </div>
                    <div class="comment-content">
                        <div class="comment-details">
                            <h4 class="comment-name">'.$user->name .'</h4>
                            <span class="comment-log">20 hours ago</span>
                        </div>
                        <div class="comment-desc">
                            <p>'. htmlspecialchars($comment->content) .'</p>
                        </div>
                        <div class="comment-data">
                            <div class="comment-likes">
                                <div class="comment-likes-up">
                                    <img src="https://rvs-comment-module.vercel.app/Assets/Up.svg" alt="">
                                    <span>2</span>
                                </div>
                                <div class="comment-likes-down">
                                    <img src="https://rvs-comment-module.vercel.app/Assets/Down.svg" alt="">
                                    <span></span>
                                </div>
                            </div>
                            <div class="comment-reply">
                                <a href="#!">Reply</a>
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
    
    public static function rec($comment){
        $curr = '<li>' . self::commentMakerFun($comment);
        if($comment->subcomments->isNotEmpty()){
            $curr .= '<ul>';
                $subcomments = $comment->subcomments;
                foreach($subcomments as $subcomment) {
                    $curr .= self::rec($subcomment);
                }
            $curr .= '</ul>';
        }
        $curr .= '</li>';
        return $curr;
    }
}
