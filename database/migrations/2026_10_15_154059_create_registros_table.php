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
        Schema::create('registros', function (Blueprint $table) {
        $table->id();
        $table->string('nombres', 100);
        $table->string('apellidos', 100);
        $table->date('fecha_nacimiento');
        $table->unsignedInteger('ninos')->default(0);
        $table->string('madre_cabeza', 2);
        $table->string('estudia', 2);
        $table->string('generos')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
