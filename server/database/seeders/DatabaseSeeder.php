<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Listing;
use App\Models\Player;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # auto generate seed data for database, now with constrained
        $user = User::factory()->create([
            'name' => 'John Dee',
            'email' => 'john@gmail.com'
        ]);
        //\App\Models\User::factory(10)->create();

        \App\Models\Listing::factory(10)->create([  // every fake data exist has John dee as foreign key 'user_id'
            'user_id' => $user->id
        ]);

        \App\Models\Player::factory(50)->create();        

        # manual generate date for database
        /*
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Listing::create([
            'title' => 'Laravel test',
            'tags' => 'laravel, testing, javascript',
            'company' => 'Acme Corp',
            'location' => 'Boston, MA',
            'email' => 'email1@enal.com',
            'website' => 'https://acme.com',
            'description' => 'lololololo'
        ]);

        Listing::create([
            'title' => 'title 2',
            'tags' => 'laravel2, testing2, javascript2',
            'company' => 'Acme2 Corp',
            'location' => 'Boston2, MA',
            'email' => 'email2@enal.com',
            'website' => 'https://acme2.com',
            'description' => 'lalalala'
        ]);
        */
        
    }
}
