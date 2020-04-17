<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = ['user_id' => 'integer', 'orderstatus_id' => 'integer', 'restaurant_charge' => 'float', 'total' => 'float'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderstatus()
    {
        return $this->belongsTo('App\Orderstatus');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function orderitems()
    {
        return $this->hasMany('App\Orderitem');
    }

    public function gpstable()
    {
        return $this->hasOne('App\GpsTable');
    }

    public function accept_delivery()
    {
        return $this->hasOne('App\AcceptDelivery');
    }

}
