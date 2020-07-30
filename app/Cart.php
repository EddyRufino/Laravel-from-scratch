<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function products()
    {
        // withPivot es para que traiga el campo sino solo trae las claves foraneas
        //return $this->BelongsToMany(Product::class)->withPivot('quantity');

        // El producto tiene (ToMany) muchos
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }

    public function getTotalAttribute()
    {
        return $this->products->pluck('total')->sum();
    }
}
