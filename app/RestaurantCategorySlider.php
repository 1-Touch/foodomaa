<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantCategorySlider extends Model
{
    /**
     * @var array
     */
    protected $casts = [
        'categories_ids' => 'object',
    ];

    /**
     * @return mixed
     */
    public function toggleActive()
    {
        $this->is_active = !$this->is_active;
        return $this;
    }
}
