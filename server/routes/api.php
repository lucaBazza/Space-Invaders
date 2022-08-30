<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Player;

use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# http://localhost/api/posts
Route::get('/posts',function(){
    return response()->json([
        'post' => [
            'title' => 'post test one'
        ]
    ]);
});

/**
 *      L O A D
 * 
 *  http://localhost/api/spaceinvaders
 *  http://192.168.1.156/api/spaceinvaders/5BA39EF7-AA34-5435-8730-9E9C751D501C   -> REAL UUID
*/
Route::get('/spaceinvaders/{uuid}',function($uuid){

    Log::channel('stderr')->info('Get player request: '.$uuid);

    $player = Player::where('uuid',$uuid)->get();

    if( count($player) == 0 ){
        return response("No player found with uuid: ".$uuid, 204)->header('Content-Type', 'text/plain');
    }   
    else{
        $player = $player[0];
        return response()->json([
                'uuid' => $player['uuid'],
                'alienKilledTotal' => $player['alienKilledTotal'],
                'bulletsFired' => $player['bulletsFired'],
                'deadsPlayer' => $player['deadsPlayer'],
                'level' => $player['level'],
                'highestScore' => $player['highestScore'],
                'globalPrecision' => $player['globalPrecision'],
                'timePlayedTotal' => $player['timePlayedTotal'],
                'sessionTotal' => $player['sessionTotal'],
                'userName' => $player['userName'],
                'gameDataTime' => $player['gameDataTime'],
                'gameVersion' => $player['gameVersion']
        ]);
    }
});


/**
 *      S A V E
 */
Route::post('/spaceinvaders/{uuid}',function($uuid){
    Log::channel('stderr')->info('Post player to save: '.$uuid);
    $playerDb = Player::where('uuid',$uuid)->get();
    if( count($playerDb) == 0 )
    {   
        $json = json_decode(request()->getContent(), true);
        
        # unity3D json bug over http post: sometimes adds "/ characters around json vars, need to decode a second time D:
        if(is_string($json))
            $json = json_decode($json);
        
        $player = new Player;
        $player->uuid = $uuid;
        $player->alienKilledTotal = $json['alienKilledTotal'];
        $player->bulletsFired = $json['bulletsFired'];
        $player->deadsPlayer = $json['deadsPlayer'];
        $player->level = $json['level'];
        $player->highestScore = $json['highestScore'];
        $player->globalPrecision = $json['globalPrecision'];
        $player->timePlayedTotal = $json['timePlayedTotal'];
        $player->sessionTotal = $json['sessionTotal'];
        $player->userName = $json['userName'];
        $player->gameDataTime = $json['gameDataTime'];
        $player->gameVersion = "0.1-alphatest";

        $player->save();

        Log::channel('stderr')->info('Player saved'.$uuid);

        return response( "new player inserted", 200);
    }
    else return response("Player already exist for uuid: ".$uuid); 
    
});