<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_meals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->json('ingredients')->nullable(true);
            $table->boolean('vegetarian')->default(false);
            $table->boolean('gluten_free')->default(false);
            $table->integer('spicy')->default(0);
            $table->foreignId('menu_id')->constrained()->cascadeOnDelete()->nullable(false);
            $table->string('image_path')->nullable(false);
            $table->boolean('is_on_home_page')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_meals');
    }
};
