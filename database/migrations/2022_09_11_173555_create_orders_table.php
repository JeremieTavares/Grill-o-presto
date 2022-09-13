<?php

use App\Models\Menu;
use App\Models\User;
use App\Models\Portion;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->string('prenom');
            $table->string('nom');
            $table->string('rue');
            $table->string('no_porte');
            $table->string('appartement')->nullable();
            $table->string('code_postal');
            $table->string('ville');
            $table->string('telephone');
            $table->string('email');
            $table->foreignIdFor(Menu::class)->constrained();
            $table->integer('prix');
            $table->integer('order_number');
            $table->boolean('is_guest');
            $table->foreignIdFor(OrderStatus::class)->constrained();
            $table->foreignIdFor(Portion::class)->constrained();
            $table->json('meals');
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
        Schema::dropIfExists('orders');
    }
};
