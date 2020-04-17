<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Restaurant extends Model
{
    use Rateable;
    /**
     * @var array
     */
    protected $casts = ['is_active' => 'integer', 'is_accepted' => 'integer', 'is_featured' => 'integer', 'delivery_type' => 'integer'];

    /**
     * @var array
     */
    protected $hidden = array('created_at', 'updated_at');

    /**
     * @return mixed
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    /**
     * @return mixed
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    /**
     * @return mixed
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return mixed
     */
    public function restaurant_categories()
    {
        return $this->belongsToMany('App\RestaurantCategory', 'restaurant_category_restaurant');
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
    public function toggleAcceptance()
    {
        $this->is_accepted = !$this->is_accepted;
        return $this;
    }
}
