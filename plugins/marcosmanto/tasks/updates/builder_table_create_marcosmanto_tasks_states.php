<?php namespace marcosmanto\Tasks\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMarcosmantoTasksStates extends Migration
{
    public function up()
    {
        Schema::create('marcosmanto_tasks_states', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 50);
            $table->string('abbreviation', 5);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('marcosmanto_tasks_states');
    }
}
