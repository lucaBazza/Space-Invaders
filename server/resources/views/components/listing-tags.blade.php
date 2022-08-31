@props(['tagsCsv'])

@php
    $tags = explode(',',$tagsCsv);
@endphp

<ul class="flex">
    @foreach($tags as $tag)
        <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
            <a href="/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>

<!--
<ul class="flex">
    <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
        <a href="#">Laravel</a>
    </li>
    <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
        <a href="#">API</a>
    </li>
    <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
        <a href="#">Backend</a>
    </li>
    <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
        <a href="#">Vue</a>
    </li>
</ul>
-->