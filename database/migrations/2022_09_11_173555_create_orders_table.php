<?php

// use App\Models\Menu;
// use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Migrations\Migration;

// return new class extends Migration
// {
    /**
     * Run the migrations.
     *
     * @return void
     */
//     public function up()
//     {
//         Schema::create('orders', function (Blueprint $table) {
//             $table->id();
//             $table->foreignIdFor(User::class)->constrained();
//             $table->string('prenom');
//             $table->string('nom');
//             $table->string('telephone');
//             $table->string('rue');
//             $table->string('no_porte');
//             $table->string('appartement');
//             $table->string('code_postal');
//             $table->string('ville');
//             $table->foreignIdFor(Menu::class)->constrained();;
//             $table->integer('prix');
//             $table->string('order_number');
//             $table->boolean('is_guest');
//             $table->string('prenom');
//             $table->string('prenom');
//             $table->string('prenom');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('orders');
//     }
// };