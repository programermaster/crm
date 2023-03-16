<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        "client_id",
        "adviser_id"
    ];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    public function adviser(){
        return $this->belongsTo('App\Models\Adviser');
    }
}
