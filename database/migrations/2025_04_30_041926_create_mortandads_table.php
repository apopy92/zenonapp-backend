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
        Schema::create('mortandads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('galpon_id')->index();
            $table->date('fecha');
            $table->integer('cantidad');
            $table->text('causa');
            $table->unsignedBigInteger('created_by')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortandads');
    }
};
