<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'price', 'ingredients', 'image', 'visibility', 'quantity'
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withPivot(['product_quantity']);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
