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
        Schema::table('investigatigations', function (Blueprint $table) {
            $table->foreignId('replied_by')->nullable()->constrained('users', 'id', 'replied_by_users_fkey')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('investigatigations', function (Blueprint $table) {
            $table->dropForeign(['replied_by']);
            $table->dropColumn('replied_by');
        });
    }
};
