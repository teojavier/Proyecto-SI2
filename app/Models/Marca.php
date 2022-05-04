<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre'
    ];

        //relacion uno a muchos Producto-Marca
        public function productos(){
            return $this->hasMany('App\Models\Producto');
        }

}
