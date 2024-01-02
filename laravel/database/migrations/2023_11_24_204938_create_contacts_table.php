<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('path', 255)
                ->default(null)
                ->nullable(true);
            $table->text('address')
                ->default(null)
                ->nullable(true);
            $table->text('gmail')
                ->default(null)
                ->nullable(true);
            $table->text('phone_number')
                ->default(null)
                ->nullable(true);
            $table->text('footer_text')
                ->default(null)
                ->nullable(true);
            $table->timestamps();
        });

        DB::table('contacts')->insert([
            'path' => '',
            'gmail' => '[]',
            'address' => '[]',
            'phone_number' => '[]',
            'footer_text' => '',
            'created_at' => now(),
            'updated_at' => now(),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
