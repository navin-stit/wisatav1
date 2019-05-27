<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomCheckDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_check_details', function (Blueprint $table) {
            $table->bigIncrements('roomcheckdetailid');
            $table->bigInteger('roomcheckheaderid')-> unsigned() -> index() ->  nullable();
            $table->bigInteger('roomcategoryid')-> unsigned() -> index() ->  nullable();
            $table->string('description');
            $table->boolean('ispriority');
            $table->boolean('iscompleted');
            $table->dateTime('completedon');
            $table->bigInteger('completedbyid')-> unsigned() -> index() ->  nullable();
            $table->timestamps();
            $table ->bigInteger('createdbyid') -> unsigned() -> index() ->  nullable();
            
           // $table -> foreign('roomcheckheaderid') -> references('roomcheckheaderid') -> on('room_check_headers');
            //$table -> foreign('roomcategoryid') -> references('roomcategoryid') -> on('room_categories');
            //$table -> foreign('completedbyid') -> references('userid') -> on('users');
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
        Schema::dropIfExists('room_check_details');
    }
}
