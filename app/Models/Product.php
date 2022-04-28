<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
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
    
    // public function getFormattedDate($date, $format = 'd-m-Y H:i:s')
    // {
    //     return Carbon::create($this->$date)->format($format);
    // }
}
