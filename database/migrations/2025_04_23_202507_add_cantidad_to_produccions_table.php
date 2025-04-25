<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('produccions', function (Blueprint $table) {
            $table->integer('cantidad')->after('fecha');
        });
    }

    public function down(): void {
        Schema::table('produccions', function (Blueprint $table) {
            $table->dropColumn('cantidad');
        });
    }
};
