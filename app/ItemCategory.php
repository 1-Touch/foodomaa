<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $hidden = array('created_at', 'updated_at');

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function toggleEnable()
    {
        $this->is_enabled = !$this->is_enabled;
        return $this;
    }
}
