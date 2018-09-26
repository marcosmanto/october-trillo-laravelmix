<?php namespace October\Demo\Components;

use Cms\Classes\ComponentBase;
use Marcosmanto\Tasks\Models\State;
use ApplicationException;
use Backend\Models\User;
use Response;
use Rainlab\Builder\Models\Settings;
use Lang;

class Todo extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Todo List',
            'description' => 'Implements a simple to-do list.'
        ];
    }

    public function defineProperties()
    {
        return [
            'max' => [
                'description'       => 'The most amount of todo items allowed',
                'title'             => 'Max items',
                'default'           => 10,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Items value is required and should be integer.'
            ]
        ];
    }

    public function onAddItem()
    {
        $items = post('items', []);

        if (count($items) >= $this->property('max')) {
            throw new ApplicationException(sprintf('Sorry only %s items are allowed.', $this->property('max')));
        }

        if (($newItem = post('newItem')) != '') {
            $items[] = $newItem;
        }

        $this->page['items'] = $items;
    }

    public function states()
    {
        $results = State::where('id', 21)->lists('name', 'id');
        //dd($results->toSql());
        return $results;
    }

    public function onRun(){
      // dd(Lang::get('october.demo::lang.app.name'));
      // Settings::set('api_key', 'ABCD');
      // dd(Settings::get('author_name'));
      // $content = $this->renderPartial('@test.htm');
      // return Response::make($content)->header('Content-type', 'text/xml');
      // return User::all();
    }
}
