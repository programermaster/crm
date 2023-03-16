<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class CashloanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CashLoan::create([
            'adviser_id' => 1,
            'client_id' => 1,
            'amount'=>100000
        ]);

        \App\Models\CashLoan::create([
            'adviser_id' => 1,
            'client_id' => 2,
            'amount'=>200000
        ]);
    }
}
