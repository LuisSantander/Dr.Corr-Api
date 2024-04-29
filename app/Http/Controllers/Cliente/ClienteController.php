<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\StoreClienteRequest;
use App\Http\Resources\Cliente\ClienteCollection;
use App\Http\Resources\Cliente\ClienteResource;
use App\Http\Resources\Cliente\FullClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();

        return response()->json($clientes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $term)
    {
       

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }


}
