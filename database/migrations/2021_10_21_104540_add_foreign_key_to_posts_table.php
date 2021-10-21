<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //l First we define the column
            $table->unsignedBigInteger('category_id')->after('id')->nullable();
            //l Then we define the foreign key itself
            //l By saying what column of what table it's related to, and setting it to null on delete
            //! NOT WORKING
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set_null');

            //l Terser method
            //$table->foreignId('category_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //l We must first delete the constraint
            $table->dropForeign('posts_category_id_foreign');

            //l We can then proceed to drop the column
            $table->dropColumn('category_id');
        });
    }
}
