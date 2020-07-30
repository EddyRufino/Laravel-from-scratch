<?php

namespace App;

use App\Scopes\AvailableScope;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    // En lugar de cargar las relaciones desde el controlador lo puedes hacer aquí, especificando las relaciones que quieres que se cargen en la consulta.
    // Y si el Model esta haciendo heredado por otro Model y no estas usando las relaciones que especificas en el Model padre, puedes usar withOut('nombre_relacion_que_no_quieres_usar')
    protected $with = [
      'images'
    ];

     protected $fillable = [
          'title',
          'description',
          'price',
          'stock',
          'status'
     ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new AvailableScope);
    }

     public function carts()
     {
          return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
     }

     public function orders()
     {
          return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
     }

     public function images()
     {
          return $this->morphMany(Image::class, 'imageable');
     }

     public function scopeAvailable($query)
     {
          $query->where('status', 'available');
     }

     public function getTotalAttribute()
     {
          return $this->pivot->quantity * $this->price;
     }
}
