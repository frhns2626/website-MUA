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
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['bronze_price', 'gold_price']);
            $table->string('platinum_price')->nullable()->after('name');
            $table->string('titanium_price')->nullable()->after('platinum_price');
            $table->string('premium_price')->nullable()->after('titanium_price');
            $table->string('gold_price')->nullable()->after('premium_price');
            $table->string('luxury_price')->nullable()->after('gold_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['platinum_price', 'titanium_price', 'premium_price', 'gold_price', 'luxury_price']);
            $table->string('bronze_price')->nullable()->after('name');
            $table->string('gold_price')->nullable()->after('bronze_price');
        });
    }
};
