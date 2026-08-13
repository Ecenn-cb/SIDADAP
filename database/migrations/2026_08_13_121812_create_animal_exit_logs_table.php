<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animal_exit_logs', function (Blueprint $table) {
            $table->id();

            // ID hewan saat masih berada di tabel animals
            $table->unsignedBigInteger('animal_id')->nullable();

            // Snapshot data hewan
            $table->string('animal_code');
            $table->string('name')->nullable();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('animal_categories')
                ->nullOnDelete();

            $table->foreignId('cage_id')
                ->nullable()
                ->constrained('cages')
                ->nullOnDelete();

            $table->foreignId('grade_id')
                ->nullable()
                ->constrained('animal_grades')
                ->nullOnDelete();

            $table->date('entry_date')->nullable();
            $table->date('exit_date');

            $table->string('reason')->default('Disembelih');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animal_exit_logs');
    }
};