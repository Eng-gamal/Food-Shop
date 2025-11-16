<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paypal extends Model
{
    use HasFactory;

    protected $table = 'paypals';

    protected $guarded = [];



    public $translatedAttributes = [
        'paypal_order_id',
        'payer_email',
        'status',
        'amount',
        'currency',
        'raw_response',
    ];

    public $timestamps = true;


    // Scopes start
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
