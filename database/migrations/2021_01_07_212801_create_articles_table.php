<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('tags');
            $table->text('introduction');
            $table->text('text')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('published_at')->nullable();
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles', function (Blueprint $table) {
            $table->dropForeign('articles_user_id_foreign');
        });
    }
}
