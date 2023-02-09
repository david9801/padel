<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->DateTime('start_time');
            $table->DateTime('end_time');
            $table->string('court_number')->nullable();
            $table->string('email');
            $table->timestamps();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users');
            //user_id es un id foraneo de la tabla reserves que va asociada a la tabla users
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
}
