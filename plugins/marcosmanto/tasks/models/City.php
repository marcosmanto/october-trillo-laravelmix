<?php namespace marcosmanto\Tasks\Models;

use Model;

/**
 * Model
 */
class City extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
      'state' => 'Marcosmanto\Tasks\Models\State'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'marcosmanto_tasks_cities';
}
