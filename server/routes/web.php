<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Player;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
# http://localhost/players/1
Route::get('/players/{player}', function(Player $player){
    return view('player', [
        'player' => $player
    ]);
});

Route::get('/stats', function(){
    return view('stats');
});

Route::get('/', function () {
    return view('spacehome',[
        'heading' => 'All recent players',
        'players' => Player::all()
    ]);
});
*/




/**
 *  use a controller to handle routing
 */
# http://localhost/                 // all listings
Route::get('/', [ListingController::class,'index']);

// show create form
Route::get('/listings/create', [ListingController::class,'create']);

// store listing data
Route::post('/listings', [ListingController::class,'store']);

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class,'edit']);

// update listing
Route::put('/listings/{listing}', [ListingController::class,'update']);

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class,'destroy']);

# http://localhost/listings/1       // single listing as last because otherwise intercept other route::get listings
Route::get('/listings/{listing}', [ListingController::class,'show']);




/**
 * 
 *      M I S C     T E S T s
 * 
*/

Route::get('/hello', function(){
    return 'Hello world';
});

Route::get('/hello2', function(){
    return Response('<h1>Hello world 2</h1>')
        ->header('Content-Type','text/plain')
        ->header('foo','bar');
});

# regex seleziona solo i numeri interi nella sub post/12345
Route::get('/post/{id}', function($id){
    
    # debug     dd  or  ddd
    ddd($id);
    
    return Response('<h1>post: '.$id.'</h1>');
})->where('id','[0-9]+');

# http://localhost/search?name=roberto&city=milano
Route::get('/search', function(Request $request){
    return $request->name . ' ' . $request->city;
});


/* Route::get('/listings/{id}', function($id){
    $listing =  Listing::find($id);
    if($listing){
        return view('listing', [
            'listing' => $listing
        ]);
    }
    else { abort('404'); }
}); */

/*Route::get('/', function () {
    return view('listings',[
        'heading' => 'Latest Listings',
        'listings' => [
            [
                'id' => 1,
                'title' => 'Listing one',
                'description' => 'lalalala'
            ],
            [
                'id' => 2,
                'title' => 'Listing 2',
                'description' => 'lulululu'
            ],
        ]
    ]);
});
Route::get('/', function () {   
    return view('welcome');
}*/