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
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['investigatigation_id']);
            $table->dropForeign(['sale_id']);
            $table->dropForeign(['rch_record_id']);
            $table->dropColumn('investigatigation_id');
            $table->dropColumn('sale_id');
            $table->dropColumn('rch_record_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('investigatigation_id')->nullable();
            $table->unsignedBigInteger('sale_id')->nullable();
            $table->unsignedBigInteger('rch_record_id')->nullable();
        });
    }
};
