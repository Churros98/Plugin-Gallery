<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('gallery_categories')) {
            Schema::create('gallery_categories', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
            });   
        }

        if (!Schema::hasTable('gallery_links')) {
            Schema::create('gallery_links', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('category_id');
                $table->unsignedInteger('image_id');
                $table->foreign('category_id')->references('id')->on('gallery_categories');
                $table->foreign('image_id')->references('id')->on('images');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_links');
        Schema::dropIfExists('gallery_categories');
    }
};