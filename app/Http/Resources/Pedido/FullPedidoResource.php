<?php

namespace App\Http\Resources\Pedido;

use App\Http\Resources\Cliente\ClienteCollection;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FullPedidoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $clientes = Pedido::find($this->id)->clientes;

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
            'id_cliente' => new ClienteCollection($this->clientes),
           // 'cliente_id' => $this->cliente_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
