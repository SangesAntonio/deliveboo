<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'email', 'name', 'lastname', 'city', 'address', 'total_amount', 'user_id'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot(['product_quantity']);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
