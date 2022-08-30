<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class player extends Model
{
    use HasFactory;

    public function randomCity() {
        $cities = ['Rome','Berlin','Madrid','London'];
        return $cities[ array_rand($cities) ];
    }
      
}
