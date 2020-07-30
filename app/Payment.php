<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    protected $dates = ['payed_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
