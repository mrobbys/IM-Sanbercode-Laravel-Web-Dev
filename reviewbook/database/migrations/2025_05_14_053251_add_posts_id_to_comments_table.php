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
        Schema::table('comments', function (Blueprint $table) {
            // Menambahkan kolom posts_id
            $table->unsignedBigInteger('posts_id')->nullable();

            // Menambahkan foreign key untuk posts_id
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Menghapus foreign key dan kolom posts_id
            $table->dropForeign(['posts_id']);
            $table->dropColumn('posts_id');
        });
    }
};
