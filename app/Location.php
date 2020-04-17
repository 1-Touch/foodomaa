<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;

    public function restaurants()
    {
        return $this->hasMany('App\Restaurant');
    }

    public function togglePopular()
    {
        $this->is_popular = !$this->is_popular;
        return $this;
    }

    public function toggleActive()
    {
        $this->is_active = !$this->is_active;
        return $this;
    }
}
