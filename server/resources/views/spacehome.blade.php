@extends('spacelayout')

@section('content')

@include('partials._spacehero')
@include('partials._spacesearch')

<h1 class="text-center text-3xl">Recent players</h1>
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @if(count($players)==0)
        <p>no players found</p>
    @endif
    
    @foreach($players as $player)

    <div class="bg-gray-50 border border-gray-200 rounded p-6">
        <div class="flex">
            <img class="hidden w-48 mr-6 md:block" src="{{asset('images/noplayerimage.png')}}" alt=""/>
            <div>
                <h3 class="text-2xl">
                    <a href="/players/{{$player['id']}}">{{$player->userName}}</a>
                </h3>
                <div class="text-xl font-bold mb-4">{{$player->gameDataTime}}</div>
                <ul class="flex">
                    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                        <a href="#">★ {{$player->highestScore}}</a>
                    </li>
                    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs" >
                        <a href="#">⚔︎ {{$player->globalPrecision}}%</a>
                    </li>
                    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs" >
                        <a href="#">☥ {{$player->deadsPlayer}}</a>
                    </li>
                    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs" >
                        <a href="#">☖ {{$player->sessionTotal}}</a>
                    </li>
                </ul>
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i> {{$player->location}} {{$player->randomCity()}}
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>
@endsection