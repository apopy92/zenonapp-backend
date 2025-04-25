<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('galpon_id')->constrained('galpones');
            $table->date('fecha');
            $table->string('concepto');
            $table->decimal('monto', 10, 2);
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('gastos');
    }
};
