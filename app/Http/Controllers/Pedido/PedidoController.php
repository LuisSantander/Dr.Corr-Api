<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pedido\StorePedidoRequest;
use App\Http\Resources\Pedido\PedidoCollection;
use App\Http\Resources\Pedido\PedidoResource;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PedidoCollection(Pedido::with('cliente')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePedidoRequest $request)
    {
        $pedido = $request->validated();

        $pedido['slug'] = $this->createSlug($pedido['name']);

        $pedido = Pedido::create($pedido);

        return response()->json([
            "message" => "Se guardo el pedidoo",
            "pedido" => $pedido
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $term)
    {
        $pedido = Pedido::where('id', $term)
            ->orWhere('slug', $term)
            ->get();


        // VALIDAR DE QUE EXISTA LA CATEGORIA
        if( count($pedido) == 0 )
        {
            return response()->json([
                "message" => "No se encontro el pedidoo",
            ], 404);
        }

        return new PedidoResource($pedido[0]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pedido = Pedido::find($id);

        if( !$pedido )
        {
            return response()->json([
                "message" => "No se encontro el pedidoo",
            ], 404);
        }

        if( $request['name'] )
        {
            $request['slug'] = $this->createSlug($request['name']);
        }

        $pedido->update( $request->all() );

        return response()->json([
            "message" => "El pedidoo fue actualizado",
            "pedido" => new PedidoResource($pedido)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pedido = Pedido::find($id);

        if( !$pedido )
        {
            return response()->json([
                "message" => "No se encontro la categoria",
            ], 404);
        }

        $pedido->delete();

        
        return response()->json([
            "message" => "El pedidoo fue eliminado",
            "pedido" => new PedidoResource($pedido),
        ], 200);
    }


    private function createSlug(string $text)
    {
        $text = strtolower($text);

        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        
        $text = trim($text, '-');
        
        $text = preg_replace('/-+/', '-', $text);
        
        return $text;
    
    }
}
