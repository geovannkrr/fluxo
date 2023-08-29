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
        Schema::create('centro_custos', function (Blueprint $table) {
            $table->increments('id_centro_custos');
            $table->string('centro_custo', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        \App\Models\Tipo::create([
            'id_tipo'=>1,
            'tipo'=>'Entrada'
        ]);

        \App\Models\Tipo::create([
            'id_tipo'=>2,
            'tipo'=>'Saida'
        ]);

        \App\Models\CentroCusto::create([
            'id_centro_custo'=>3,
            'centro_custo'=>'Salario'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_custos');
    }
};
