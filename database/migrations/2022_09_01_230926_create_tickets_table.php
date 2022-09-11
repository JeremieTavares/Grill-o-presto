<?php

use App\Models\User;
use App\Models\TicketType;
use App\Models\TicketStatus;
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
            $table->string('order_number')->nullable();
            $table->foreignIdFor(TicketType::class)->constrained();
            $table->foreignIdFor(TicketStatus::class)->constrained();
            $table->foreignIdFor(User::class)->constrained()->nullable();
            $table->text('description');
            $table->string('email')->nullable();
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
