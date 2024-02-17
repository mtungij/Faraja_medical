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
        Schema::table('treatments', function (Blueprint $table) {

            $table->string('medicine_name');
            $table->string('quantity');
            $table->string('route');
            $table->string('frequency');
            $table->text('duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->dropColumn('medicine_name');
            $table->dropColumn('quantity');
            $table->dropColumn('route');
            $table->dropColumn('frequency');
            $table->dropColumn('duration');
        });
    }
};
