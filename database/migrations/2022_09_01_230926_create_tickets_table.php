<?php

use App\Models\User;
use App\Models\TicketType;
use App\Models\TicketState;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_number');
            $table->foreignIdFor(TicketType::class)->constrained();
            $table->foreignIdFor(TicketState::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->text('description');
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
        Schema::dropIfExists('tickets');
    }
};
