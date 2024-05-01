@props(['comments'])
@php

    $curr = '';

@endphp
<section class="comment-module">

    <ul>
        @foreach ($comments as $comment)
            {!! \App\Helpers\CommentHelper::rec($comment) !!}
        @endforeach

    </ul>
</section>
<script>
    function getNthLevelParent(element, level) {
        var parent = element.parentNode;
        for (var i = 1; i < level; i++) {
            if (parent === null) {
                return null; // Return null if the desired level exceeds the document root
            }
            parent = parent.parentNode;
        }
        return parent;
    }
    var commentReply = document.querySelectorAll('.commentli');
    
    commentReply.forEach(reply => {
        var button = reply.querySelector('button');
        button.addEventListener('click', function() {
            // Do something when the button is clicked
            var ulelem = reply.querySelector('ul');
            console.log(ulelem.innerHTML);
            if(ulelem.firstChild.style.display != "block")ulelem.firstChild.style.display = "block";
            else ulelem.firstChild.style.display = "none";

            console.log(ulelem.firstChild.style.display);
        });
    });

    
</script>
