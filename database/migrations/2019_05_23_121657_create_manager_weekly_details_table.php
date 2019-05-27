<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerWeeklyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_weekly_details', function (Blueprint $table) {
            $table->bigIncrements('managerweeklydetailid');
            $table->bigInteger('managerweeklyheaderid')-> unsigned() -> index() ->  nullable();
            $table->string('description');
            $table->boolean('iscompleted');
            $table->dateTime('completedon');
            $table->bigInteger('completedbyid')-> unsigned() -> index() ->  nullable();
            $table->timestamps();
            $table ->bigInteger('createdbyid') -> unsigned() -> index() ->  nullable();
            
           // $table -> foreign('managerweeklyheaderid') -> references('managerweeklyheaderid') -> on('manager_weekly_headers');
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
        Schema::dropIfExists('manager_weekly_details');
    }
}
