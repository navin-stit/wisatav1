<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table -> increments('userperimssionid');
            $table ->bigInteger('moduleid') -> unsigned() -> index() ->  nullable();
            $table ->bigInteger('userid') -> unsigned() -> index() ->  nullable();
            $table->boolean('view');
            $table->boolean('add');
            $table->boolean('edit');
            $table->boolean('delete');
            //$table -> foreign('moduleid') -> references('moduleid') -> on('modules');
            //$table -> foreign('userid') -> references('userid') -> on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permissions');
    }
}
