<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('mesa_id')->constrained()->onDelete('cascade');
            $table->foreignId('turno_id')->constrained()->onDelete('cascade');
            $table->date('fecha');
            $table->integer('comensales');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->unique(['mesa_id', 'turno_id', 'fecha']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
