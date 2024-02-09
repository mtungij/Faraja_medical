<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove unique constraint from 'username' column
            $table->dropUnique(['username']);
        });
    }

    
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Check for existing data before adding the unique constraint back
            $existingEmptyUsernames = DB::table('users')->where('username', '')->exists();
    
            if (!$existingEmptyUsernames) {
                $table->unique('username');
            }
        });
    }
};
