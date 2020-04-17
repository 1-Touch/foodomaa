<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $dates = ['expiry_date'];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
