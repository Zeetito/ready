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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('author_id')->constrained();
            $table->string('coverPic');
            $table->double('price', 8, 2)->nullable();
            $table->integer('inStock')->nullable();//Number of that book in stock.. Can be null for now
            $table->integer('isSold')->default('0');//Number of the book sold
            $table->integer('isAvailable')->nullable();//Number of the book available for purchase
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
