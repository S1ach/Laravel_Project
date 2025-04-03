<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserRole extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'role_id')) {
            $table->unsignedBigInteger('role_id')->nullable()->after('id');
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
