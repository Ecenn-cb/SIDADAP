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
        Schema::create('prices', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->integer('box_count');
            $table->decimal('female_price', 19,0);
            $table->decimal('male_price', 19,0);
            $table->timestamps();

            $table->foreign('package_id')
                  ->references('id')
                  ->on('packages')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
