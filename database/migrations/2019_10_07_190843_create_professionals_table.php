<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('professionals');
        Schema::create(
            'professionals', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('img');
                $table->string('phone');
                $table->timestamps();
            }
        );

        Schema::create(
            'fields', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            }
        );

        Schema::create(
            'field_professional', function (Blueprint $table) {
                $table->integer('field_id')->unsigned();
                $table->integer('professional_id')->unsigned();
            }
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void\
     */
    public function down()
    {
        Schema::dropIfExists('professionals');
        Schema::dropIfExists('fileds');
        Schema::dropIfExists('field_professional');
        
        Schema::create(
            'professionals', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('mail');
                $table->string('phone');
                $table->timestamps();
            }
        );
    }
}
