<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    /**
     * @var array
     */
    protected $casts = ['is_recommended' => 'integer', 'is_popular' => 'integer', 'is_new' => 'integer', 'is_veg' => 'integer'];

    /**
     * @var array
     */
    protected $hidden = array('created_at', 'updated_at');

    /**
     * @return mixed
     */
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    /**
     * @return mixed
     */
    public function item_category()
    {
        return $this->belongsTo('App\ItemCategory');
    }

    /**
     * @return mixed
     */
    public function toggleActive()
    {
        $this->is_active = !$this->is_active;
        return $this;
    }

    /**
     * @return mixed
     */
    public function addon_categories()
    {
        return $this->belongsToMany(AddonCategory::class);
    }

}
