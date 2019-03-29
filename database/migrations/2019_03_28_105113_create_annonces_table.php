<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->text('description')->nullable();
            $table->unsignedDecimal('price', 7, 2)->nullable();
            $table->enum('status', ['published', 'unpublished', 'archived'])->default('unpublished');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('annonces');
        Schema::table('annonces', function (Blueprint $table) {
            $table->dropForeign('annonces_user_id_foreign');
            $table->drop('annonces');
        });
    }
}
