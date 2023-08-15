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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('brand', 255)->nullable();
            $table->longText('description')->nullable();
            $table->longText('information')->nullable();
            $table->integer('qty');
            $table->integer('price');
            $table->string('article');
            $table->boolean('is_active')->default(true);
            $table->foreignId('category_id')->constrained()->onDelete('no action')->onUpdate('no action');
            $table->foreignId('sub_category_id')->constrained()->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
