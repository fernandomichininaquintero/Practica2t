<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';

    // mirar https://laravel.com/docs/8.x/eloquent-mutators#accessors-and-mutators
    // public function getPrecioFinalAttribute($value)
    // {
    //     return ucfirst($value);
    // }

    public function getPrecioFinal()
    {
        if ($this->descuento==0) {
            return $this->precio;
        }

        $descuento = ($this->descuento * $this->precio)/100;
            
        return $this->precio - $descuento;
    }
}
