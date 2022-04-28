<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'email', 'name', 'lastname', 'city', 'address', 'total_amount'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
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
