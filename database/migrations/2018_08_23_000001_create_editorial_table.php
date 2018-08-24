<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorialTable extends Migration
{
    public function up()
    {
        Schema::create('editorial', function (Blueprint $table) {
            $table->increments('id');

            $table->text('text');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('editorial');
    }
}
