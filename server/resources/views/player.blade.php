@extends('spacelayout')

@section('content')

@include('partials._spacesearch')

<a href="/" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6"
                src="{{asset('images/noplayerimage.png')}}" alt=""/>
            <h3 class="text-2xl mb-2">{{$player->userName}}</h3>
            <div class="text-xl font-bold mb-4">{{$player->company}}</div>
            <ul class="flex">
                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                    <a href="#">★ {{$player->highestScore}}</a>
                </li>
                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                    <a href="#">⚔︎ {{$player->globalPrecision}}%</a>
                </li>
                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                    <a href="#">☥ {{$player->deadsPlayer}}</a>
                </li>
                <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
                    <a href="#">☖ {{$player->sessionTotal}}</a>
                </li>
            </ul>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i>{{$player->randomCity()}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div style="display: flex">
                <div style="flex: 50%">
                    <h3 class="text-3xl font-bold mb-4">
                        List of game session:
                    </h3>
                    <div class="text-lg space-y-6">
<!--                         <p> 
                            {{$player->description}}
                        </p>
                        <a href="mailto:{{$player->userName}}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                            <i class="fa-solid fa-envelope"></i>
                            Contact Employer
                        </a>
                        <a href="{{$player->userName}}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
                            <i class="fa-solid fa-globe"></i> 
                            Visit Website
                        </a> -->
                        ... <br>
                        ... <br>
                        ... <br>
                        ... 
                    </div>
                </div>
                <div style="flex: 50%">
                    <h3 class="text-3xl font-bold mb-4">
                        User settings:
                    </h3>
                    ... <br>
                    ... <br>
                    ... <br>
                    ... 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection