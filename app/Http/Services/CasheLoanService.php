<?php

namespace App\Http\Services;

use App\Models\CashLoan;
use App\Models\HomeLoan;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class CasheLoanService
{

    /**
     * Fetch Books collection.
     *
     * @return LengthAwarePaginator
     */
    public function fetchAll()
    {
       $cash_loans= CashLoan::query()->where("adviser_id", Auth::id())->get();
       $home_loans= HomeLoan::query()->where("adviser_id", Auth::id())->get();
       $products = $cash_loans->merge($home_loans)->sortByDesc('created_at');

       return $products;
    }
}
