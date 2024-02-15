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
        Schema::table('investigation_items', function (Blueprint $table) {
            $table->foreignId('investigation_id')->nullable()->constrained('investigations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('investigation_items', function (Blueprint $table) {
            $table->dropForeign(['investigation_id']);
            $table->dropColumn('investigation_id');
        });
    }
};
