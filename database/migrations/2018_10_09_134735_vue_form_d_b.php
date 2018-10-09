<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VueFormDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("VueForm", function (Blueprint $tb) {
            $tb->increments("ID");
            $tb->string("Title");
            $tb->integer("Version")->default(1);
            $tb->dateTime("CreatedDate");
            $tb->dateTime("ModifiedDate");

            // you can have more column to track??
        });

        Schema::create("VueFormData", function (Blueprint $tb) {
            $tb->increments("ID");
            $tb->integer("VueFormID")->unsigned();
            $tb->integer("Version");
            $tb->longText("Data");

            $tb->foreign("VueFormID")->references('ID')->on('VueForm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("VueFormData");
        Schema::dropIfExists("VueForm");
    }
}
