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
        //add declined_at and declined integer column to comments table
        Schema::table('comments', function (Blueprint $table) {
            $table->timestamp('declined_at')->nullable()->after('body');
            $table->integer('declined')->default(0)->after('declined_at');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remove declined_at and declined integer column from comments table
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('declined_at');
            $table->dropColumn('declined');
        });
    }
};
