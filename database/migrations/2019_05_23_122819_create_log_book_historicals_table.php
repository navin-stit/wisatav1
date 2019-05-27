<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogBookHistoricalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_book_historicals', function (Blueprint $table) {
            $table->bigIncrements('logbookhistoricalid');
            $table ->bigInteger('logbookdetailid') -> unsigned() -> index() ->  nullable();
            $table ->bigInteger('logbookheaderid') -> unsigned() -> index() ->  nullable();
            $table->string('notes');
            $table->timestamps();
            $table ->bigInteger('createdbyid') -> unsigned() -> index() ->  nullable();
            
            //$table -> foreign('logbookdetailid') -> references('logbookdetailid') -> on('log_book_details');
           // $table -> foreign('logbookheaderid') -> references('logbookheaderid') -> on('log_book_headers');
           // $table -> foreign('createdbyid') -> references('userid') -> on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_book_historicals');
    }
}
