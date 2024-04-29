<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_pedido')->unique();
            $table->string('descripcion')->unique();;
            $table->string('ancho');
            $table->string('alto');
            $table->string('largo');
            $table->string('peso');
            $table->string('cantidad');
            $table->string('calidad');
            $table->decimal('lat', 10, 8)->default(0);
            $table->decimal('lng', 11, 8)->default(0);
            $table->string('fecha_pedido');
            $table->string('fecha_entrega');
            $table->foreignId('id_cliente')->constrained('clientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
