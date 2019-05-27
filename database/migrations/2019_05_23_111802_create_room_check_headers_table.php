<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomCheckHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_check_headers', function (Blueprint $table) {
            $table->bigIncrements('roomcheckheaderid');
            $table->date('roomcheckdate');
            $table->string('roomchecktitle');
            $table->bigInteger('roomid')-> unsigned() -> index() ->  nullable();
            $table->timestamps();
            $table ->bigInteger('createdbyid') -> unsigned() -> index() ->  nullable();
            
            //$table -> foreign('roomid') -> references('roomid') -> on('rooms');
            //$table -> foreign('createdbyid') -> references('userid') -> on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_check_headers');
    }
}
