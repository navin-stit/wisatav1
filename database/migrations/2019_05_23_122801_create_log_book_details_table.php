<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_book_details', function (Blueprint $table) {
            $table->bigIncrements('logbookdetailid');
            $table ->bigInteger('logbookheaderid') -> unsigned() -> index() ->  nullable();
            $table->string('notes');
            $table->timestamps();
            $table ->bigInteger('createdbyid') -> unsigned() -> index() ->  nullable();
            
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
        Schema::dropIfExists('log_book_details');
    }
}
