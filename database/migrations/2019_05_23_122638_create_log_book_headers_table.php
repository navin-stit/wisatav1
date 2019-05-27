<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogBookHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_book_headers', function (Blueprint $table) {
            $table->bigIncrements('logbookheaderid');
            $table->date('logbookdate');
            $table->string('logbooktitle');
            $table->timestamps();
            $table ->bigInteger('createdbyid') -> unsigned() -> index() ->  nullable();
            
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
        Schema::dropIfExists('log_book_headers');
    }
}
