
@props(['comments'])
@php

    $curr = '';
   


@endphp
<section class="comment-module">

    <ul>
        @foreach($comments as $comment)
        {!! \App\Helpers\CommentHelper::rec($comment) !!}
            
        @endforeach

    </ul>
</section>