@props(['tagsCsv'])

@php
    $tags = explode(',' , $tagsCsv);
@endphp

<ul  {{$attributes->merge(['class' => 'flex ml-0 mt-5'])}}>
    @foreach ($tags as $tag)
    <li style="border-radius: 1rem; padding-left: 0.75rem padding-right: 0.75rem; padding-top: 0.25rem; padding-bottom: 0.25rem;"  >
        <a class="text-s px-2 py-1 border border-white/20 rounded-full capitalize text-gray-300" href="/?tags={{$tag}}">{{$tag}}</a>
    </li>  
    @endforeach 
    
</ul>