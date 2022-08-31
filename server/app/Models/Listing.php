<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // disabled because mass assignement is allowed globally on AppServiceProvider.boot()
    //protected $fillable = ['title','company','location','website','email','description','tags'];  

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){ // if is not false, move on
            $query->where('tags','like','%'.request('tag').'%');
        }
        if($filters['search'] ?? false){ // if is not false, move on
            $query->where('title','like','%'.request('search').'%')
                ->orWhere('description','like','%'.request('search').'%')
                ->orWhere('tags','like','%'.request('search').'%');
        }
    }
}
