<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {

            $table->id();
            //l create columns that will act as foreign keys
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            //l define foreign keys
            //l $table->foreign(<column name)->references(<reference column>)->on(<table name>)
            //l onDelete('cascade'): on deletion, also delete the item's relations
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            //l in a pivot table, we don't need a timestamp column
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
