<?php

namespace App\Http\Resources\Pedido;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    
    public static $wrap = "pedido";

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'numero_pedido' => $this->numero_pedido,
            'descripcion' => $this->descripcion,
            'ancho' => $this->ancho,
            'alto' => $this->alto,
            'largo' => $this->largo,
            'cantidad' => $this->cantidad,
            'calidad' => $this->calidad,
            'fecha_pedido' => $this->fecha_pedido,
            'fecha_entrega' => $this->fecha_entrega,
            'razon_social' => $this->cliente ? $this->cliente->razon_social : null,
            'id_cliente' => $this->id_cliente,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
