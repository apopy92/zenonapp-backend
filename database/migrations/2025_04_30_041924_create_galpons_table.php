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
        Schema::create('galpons', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('ubicacion', 255);
            $table->integer('capacidad');
            $table->unsignedBigInteger('created_by')->index();
            $table->string('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galpons');
    }
};
