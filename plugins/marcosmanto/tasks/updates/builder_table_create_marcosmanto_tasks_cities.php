<?php namespace marcosmanto\Tasks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMarcosmantoTasksCities extends Migration
{
    public function up()
    {
        Schema::create('marcosmanto_tasks_cities', function($table)
        {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->string('name');
          $table->string('ibge_code', 20)->nullable();
          $table->integer('state_id')->unsigned();
          $table->foreign('state_id')->references('id')->on('states');
          $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('marcosmanto_tasks_cities');
    }
}