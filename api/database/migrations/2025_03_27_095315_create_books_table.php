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
            $table->uuid('id')->primary();
            $table->foreignUuid('catalog_id')
                ->constrained('catalogs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('author');
            $table->string('isbn', 20)->unique();
            $table->date('published_date');
            $table->decimal('price', 10, 2);
            $table->integer('quantity')->default(0);
            $table->string('cover')->nullable();
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
