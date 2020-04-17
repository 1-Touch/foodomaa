<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryGuyDetail extends Model
{

    /**
     * @var array
     */
    protected $hidden = ['id', 'created_at', 'updated_at', 'gender'];

    /**
     * @return mixed
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
