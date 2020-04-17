<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    public function addon_category()
    {
        return $this->belongsTo('App\AddonCategory');
    }
}
