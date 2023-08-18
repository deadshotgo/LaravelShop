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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->boolean('is_active')->default(true);
            $table->foreignId('blog_id')
                ->nullable(true)
                ->constrained()
                ->onUpdate('no action')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->nullable(true)
                ->constrained()
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('blogs');
    }
};
