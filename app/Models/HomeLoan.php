<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'down_payment_amount',
        'property_value',
        'adviser_id',
        'client_id'
    ];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
}
