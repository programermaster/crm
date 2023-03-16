<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Client::create([
            "first_name" => "Client1",
            "last_name" => "Client1",
            "email"=>"client1@gmail.com",
            "phone"=>"064123456",
        ]);

        \App\Models\Client::create([
            "first_name" => "Client2",
            "last_name" => "Client2",
            "email"=>"client2@gmail.com",
            "phone"=>"064654321",
        ]);
    }
}
