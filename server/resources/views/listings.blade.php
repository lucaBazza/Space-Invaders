@extends('layout')

@section('content')
<h3>{{$heading}}</h3>

@if(count($listings)==0)
    <p>no listing found</p>
@endif
@foreach($listings as $listing)
    <h2>
        <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
    </h2>
    <p>{{$listing['description']}}</p>
@endforeach

@endsection