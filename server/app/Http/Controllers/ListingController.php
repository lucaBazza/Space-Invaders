<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show listings with querys on tags, searchbar
    public function index(){
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag','search']))->get()  // Listing::all()
        ]);
    }

    //show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form
    public function create(){
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request){
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);
        Listing::create($formFields);
        return redirect('/');
    }
}

/**
 *  Listing controller creato con php artisan make:controller ListingController
 *  consigliato usare la naming convention: index / show / create / store / edid / update / destroy
 *  return view('listings') usa il componente nella cartella resources/views, 
 *      per usare le sotto-cartelle usare es.listings.destroy
 */

 /*      
                common resource routes (when using a Controller)

    index - show all listings
    show - show single listing
    create - show form to create new listing
    store - store new listing
    edit - show form to edit listing
    update - update listing
    destroy - delete listing

*/

