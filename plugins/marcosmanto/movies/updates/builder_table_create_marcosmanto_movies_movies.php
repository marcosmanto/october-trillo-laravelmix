<?php namespace marcosmanto\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMarcosmantoMoviesMovies extends Migration
{
    public function up()
    {
        Schema::create('marcosmanto_movies_movies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('marcosmanto_movies_movies');
    }
}
