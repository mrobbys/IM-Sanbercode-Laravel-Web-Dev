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
            // Mengubah kolom book_id menjadi nullable
            $table->unsignedBigInteger('book_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Mengembalikan kolom book_id menjadi NOT NULL
            $table->unsignedBigInteger('book_id')->nullable(false)->change();
        });
    }
};
