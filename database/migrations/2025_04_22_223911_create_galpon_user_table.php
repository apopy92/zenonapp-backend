<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('galpon_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('galpon_id')->constrained('galpones')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('galpon_user');
    }
};

