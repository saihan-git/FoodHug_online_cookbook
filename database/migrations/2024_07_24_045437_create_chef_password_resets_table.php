<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChefPasswordResetsTable extends Migration
{
    public function up()
    {
        Schema::create('chef_password_resets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chef_password_resets');
    }
}
