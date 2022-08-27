<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        # auto generate seed data for database
        \App\Models\Listing::factory(10)->create();

        # manual generate date for database
        /*
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
