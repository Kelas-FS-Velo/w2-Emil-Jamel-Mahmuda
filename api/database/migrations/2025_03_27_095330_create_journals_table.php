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
        Schema::create('journals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('catalog_id')
                ->constrained('catalogs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('author');
            $table->string('publisher');
            $table->string('issn', 20)->unique();
            $table->date('publish_date');
            $table->integer('volume');
            $table->integer('issue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
