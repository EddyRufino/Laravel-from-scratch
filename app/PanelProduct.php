<?php

namespace App;

use App\Product;

// Expendemos - Herencia del Model Product
class PanelProduct extends Product
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        //
    }
}
