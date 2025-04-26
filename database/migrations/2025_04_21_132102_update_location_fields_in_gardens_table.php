<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gardens', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
        });

        // Copy existing location data to address field
        DB::table('gardens')->update([
            'address' => DB::raw('location')
        ]);

        Schema::table('gardens', function (Blueprint $table) {
            $table->dropColumn('location');
            // Make fields required after data migration
            $table->string('address')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->string('state')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gardens', function (Blueprint $table) {
            $table->string('location');
            // Copy address back to location
            DB::table('gardens')->update([
                'location' => DB::raw('address')
            ]);
            $table->dropColumn(['address', 'city', 'state']);
        });
    }
};
