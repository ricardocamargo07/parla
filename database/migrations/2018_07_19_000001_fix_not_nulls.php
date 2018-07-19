<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixNotNulls extends Migration
{
    public function up()
    {
        Schema::table('article_photos', function (Blueprint $table) {
            $table
                ->string('author')
                ->nullable()
                ->change();

            $table
                ->text('notes')
                ->nullable()
                ->change();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table
                ->string('category')
                ->nullable()
                ->change();

            $table
                ->string('subtitle')
                ->nullable()
                ->change();
        });
    }

    public function down()
    {

    }
}
