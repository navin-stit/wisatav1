<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomCategoryHistoricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_category_historicals', function (Blueprint $table) {
            $table->bigIncrements('roomcategoryhistoricalid');
            $table->bigInteger('roomcategoryid')-> unsigned() -> index() ->  nullable();
            $table->string('roomcategoryname');
            $table->timestamps();
            $table ->bigInteger('createdbyid') -> unsigned() -> index() ->  nullable();
           // $table -> foreign('roomcategoryid') -> references('roomcategoryid') -> on('room_categories');
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
        Schema::dropIfExists('room_category_historicals');
    }
}
