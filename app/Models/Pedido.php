<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;


    protected $fillable = [
        'numero_pedido',
        'descripcion',
        'ancho',
        'alto',
        'largo',
        'peso',
        'cantidad',
        'calidad',
        'fecha_pedido',
        'fecha_entrega',
        'id_cliente'
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
