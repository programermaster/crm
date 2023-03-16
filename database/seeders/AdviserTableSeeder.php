<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;

class AdviserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Adviser::create([
            "first_name" => "Adviser1",
            "last_name" => "Adviser1",
            "email"=>"adviser1@gmail.com",
            "password" => Hash::make("adviser1")
        ]);

        \App\Models\Adviser::create([
            "first_name" => "Adviser2",
            "last_name" => "Adviser2",
            "email"=>"adviser2@gmail.com",
            "password" => Hash::make("adviser2")
        ]);
    }
}
