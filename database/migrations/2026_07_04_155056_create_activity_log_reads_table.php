<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_log_reads', function (Blueprint $table) {

            $table->id();

            $table->foreignId('activity_log_id')
                ->constrained('activity_logs')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();

            // Satu user hanya bisa membaca satu notifikasi satu kali
            $table->unique(['activity_log_id', 'user_id']);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_log_reads');
    }
};