<?php
    namespace App\Models;

    class Listing{
        public static function all(){
            return [
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
            ];
        }

        public static function find($id){
            $listings = self::all();
            foreach($listings as $listing){
                if($listing['id'] == $id)
                    return $listing;
            }
        }
    }