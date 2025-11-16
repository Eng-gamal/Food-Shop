<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offers';

    protected $guarded = [];

    public $timestamps = true;



    public function product()
    {
        return $this->belongsTo(Product::class);
    }



}
