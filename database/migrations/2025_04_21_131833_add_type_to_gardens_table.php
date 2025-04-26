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
        Schema::table('gardens', function (Blueprint $table) {
            $table->enum('type', ['vegetable', 'flower', 'herb', 'mixed', 'other'])->default('mixed')->after('size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gardens', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
