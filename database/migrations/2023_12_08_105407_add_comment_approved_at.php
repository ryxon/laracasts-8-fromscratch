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
        //add approved_at column to comments table and approved interger column
        Schema::table('comments', function (Blueprint $table) {
            $table->timestamp('approved_at')->nullable()->after('body');
            $table->integer('approved')->default(0)->after('approved_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remove approved_at column from comments table
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('approved_at');
            $table->dropColumn('approved');
        });
    }
};
