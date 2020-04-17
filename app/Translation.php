<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    /**
     * @var array
     */
    protected $casts = [
        'is_default' => 'integer',
    ];

    /**
     * @return mixed
     */
    public function toggleEnable()
    {
        $this->is_active = !$this->is_active;
        return $this;
    }
}
