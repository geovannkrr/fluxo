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
        Schema::create('tipos', function (Blueprint $table) {
            $table->increments('id_tipo');
            $table->string('tipo',45);
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

         \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos');
    }
};
