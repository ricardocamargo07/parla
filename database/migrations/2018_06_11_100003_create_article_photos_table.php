<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_photos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('article_id')->unsigned();

            $table->boolean('main')->default(false);
            $table->string('url_highres');
            $table->string('url_lowres');
            $table->string('author');
            $table->text('notes');

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
        Schema::dropIfExists('article_authors');
    }
}
