@props(['tagsCsv'])

@php
    $tags = explode(',' , $tagsCsv);
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
    <li style="border-radius: 1rem; padding-left: 0.75rem; padding-right: 0.75rem; padding-top: 0.25rem; padding-bottom: 0.25rem;"  >
        <a class="btn btn2" href="/?tags={{$tag}}">{{$tag}}</a>
    </li>  
    @endforeach 
    
</ul>