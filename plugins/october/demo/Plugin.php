<?php namespace October\Demo;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use System\Classes\PluginBase;
use Backend;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'October Demo',
            'description' => 'Provides features used by the provided demonstration theme.',
            'author'      => 'Alexey Bobkov, Samuel Georges',
            'icon'        => '',
            'iconSvg'     => 'plugins/october/demo/assets/images/chevron-thin-right.svg'
        ];
    }

    public function registerComponents()
    {
        return [
            '\October\Demo\Components\Todo' => 'demoTodo'
        ];
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                // A global function, i.e str_plural()
                'plural' => 'str_plural',

                // A local method, i.e $this->makeTextAllCaps()
                'uppercase' => [$this, 'makeTextAllCaps']
            ],
            'functions' => [
                'tchau_querida' => ['October\Demo\Classes\Bye', 'tchau'],
                'icon_list' => ['RainLab\Builder\Classes\IconList', 'getList'],
                // Using an inline closure
                'helloWorld' => function ($text=null) {
                    return $text ? $text : 'Hello World!';
                }
            ]
        ];
    }

    public function registerNavigation()
    {
        return [
            'Movies' => [
                'label'       => 'Movies create',
                'url'         => Backend::url('marcosmanto/movies/movies/create'),
                'icon'        => 'icon-music',
                'permissions' => [],
                'order'       => 500,
    
                'sideMenu' => [
                    'movies-list' => [
                        'label'       => 'Movies List',
                        'icon'        => 'icon-list',
                        'url'         => Backend::url('marcosmanto/movies/movies'),
                        'permissions' => []
                    ],
                    // 'categories' => [
                    //     'label'       => 'Categories',
                    //     'icon'        => 'icon-copy',
                    //     'url'         => Backend::url('acme/blog/categories'),
                    //     'permissions' => ['acme.blog.access_categories']
                    // ]
                ]
            ]
        ];
    }


    public function makeTextAllCaps($text)
    {
        return strtoupper($text);
    }
}
