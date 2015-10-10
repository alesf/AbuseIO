<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'role_user',
            function (Blueprint $table) {

                $table->increments('id');
                $table->integer('role_id');
                $table->integer('user_id');

            }
        );

        $this->addDefaultRolesUsers();
    }

    public function addDefaultRolesUsers()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_user');
    }
}
