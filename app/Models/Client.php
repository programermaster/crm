<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email'
    ];

    public function cash_loan(){
        return $this->hasOne('App\Models\CashLoan');
    }

    public function home_loan(){
        return $this->hasOne('App\Models\HomeLoan');
    }
}
