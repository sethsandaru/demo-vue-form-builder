<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('form_id');
            $table->timestamps();

            // indexes
            $table->index('path');
            $table->index('form_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_form');
    }
}
