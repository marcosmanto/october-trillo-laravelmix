<?php namespace marcosmanto\Tasks\Models;

use Model;

/**
 * Model
 */
class State extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
      'cities' => 'Marcosmanto\Tasks\Models\City'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'marcosmanto_tasks_states';
}
