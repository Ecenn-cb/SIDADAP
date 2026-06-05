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
        Schema::create('animals', function(Blueprint $table){
            $table->id();
            
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('cage_id');
            $table->unsignedBigInteger('grade_id');

            $table->string('gender', 10);
            $table->integer('weight');
            $table->integer('age');
            $table->string('image', 255);

            $table->unsignedBigInteger('description_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            //foreign
            $table->foreign('category_id')
                  ->references('id')
                  ->on('animal_categories')
                  ->onDelete('cascade');

            $table->foreign('cage_id')
                  ->references('id')
                  ->on('cages')
                  ->onDelete('cascade');

            $table->foreign('grade_id')
                  ->references('id')
                  ->on('animal_grades')
                  ->onDelete('cascade');

            $table->foreign('description_id')
                  ->references('id')
                  ->on('animal_descriptions')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
