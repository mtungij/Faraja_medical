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
        Schema::table('surgical_record_items', function (Blueprint $table) {
            $table->foreignId('surgical_record_id')->nullable()->constrained('surgical_records')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surgical_record_items', function (Blueprint $table) {
            $table->dropForeign(['surgical_record_id']);
            $table->dropColumn('surgical_record_id');
        });
    }
};
