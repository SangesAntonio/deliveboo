<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'price', 'description', 'image', 'visibility'
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
