<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produccions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('galpon_id')->constrained('galpones')->onDelete('cascade');
            $table->date('fecha');
            $table->integer('cantidad');
            $table->string('tipo');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('produccions');
    }
};
