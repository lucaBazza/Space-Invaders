<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view('listings.index',[
            'listings' => Listing::all()
        ]);
    }

    //show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}

/**
 *  Listing controller creato con php artisan make:controller ListingController
 *  consigliato usare la naming convention: index / show / create / store / edid / update / destroy
 *  return view('listings') usa il componente nella cartella resources/views, 
 *      per usare le sotto-cartelle usare es.listings.destroy
 */