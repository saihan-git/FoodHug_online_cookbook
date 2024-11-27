<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->text('description');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('rated_by');
            $table->unsignedInteger('category_id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->foreign('created_by')->references('id')->on('chefs')->onDelete('cascade');
            $table->foreign('rated_by')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
