<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoSlider extends Model
{
    public function slides()
    {
        return $this->hasMany('App\Slide');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function toggleActive()
    {
        $this->is_active = !$this->is_active;
        return $this;
    }
}
