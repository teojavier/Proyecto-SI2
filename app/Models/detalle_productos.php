<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_productos extends Model
{
    use HasFactory;
    protected $fillable = [
        'proveedor_id',
        'producto_id',
        'cantidad',
        'precio',
    ];
}
