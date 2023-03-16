<?php

namespace Database\Seeders;

use App\Models\Adviser;
use App\Models\Author;
use App\Models\CashLoan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdviserTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(CashloanTableSeeder::class);
        $this->call(HomeloanTableSeeder::class);
    }
}
