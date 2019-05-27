<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontDeskDailyHistoricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_desk_daily_historicals', function (Blueprint $table) {
            $table->bigIncrements('frontdeskdailyhistoricalid');
            $table->bigInteger('frontdeskdailydetailid')-> unsigned() -> index() ->  nullable();
            $table->bigInteger('frontdeskdailyheaderid')-> unsigned() -> index() ->  nullable();
            $table->string('description');
            $table->boolean('ispriority');
            $table->boolean('iscompleted');
            $table->dateTime('completedon');
            $table->bigInteger('completedbyid')-> unsigned() -> index() ->  nullable();
            $table->dateTime('startdatetime');
            $table->dateTime('enddatetime');
            $table->timestamps();
            $table ->bigInteger('createdbyid') -> unsigned() -> index() ->  nullable();
            
           // $table -> foreign('frontdeskdailydetailid') -> references('frontdeskdailydetailid') -> on('front_desk_daily_details');
           // $table -> foreign('frontdeskdailyheaderid') -> references('frontdeskdailyheaderid') -> on('front_desk_daily_headers');
           // $table -> foreign('completedbyid') -> references('userid') -> on('users');
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
        Schema::dropIfExists('front_desk_daily_historicals');
    }
}
