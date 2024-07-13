<?php

namespace App\View\Components\Home;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use function url;
use function view;

class Portfolio extends Component
{
    public array $items = [];

    public array $tabs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = [
            [
                'category' => ['Node.js'],
                'title' => 'Simple interface with CRUD functionality',
                'image' => url('/img/CRUD.png'),
                'github' => 'https://github.com/razvantaga/NodeJS/tree/main/nodejs'
            ],
            [
                'category' => ['React.js'],
                'title' => 'Real time chat application with firebase',
                'image' => url('/img/chat.png'),
                'github' => 'https://github.com/razvantaga/ReactJS/tree/main/reactjs'
            ],
            [
                'category' => ['PHP'],
                'title' => 'Full stack application about a zoo',
                'image' => url('/img/zoo.jpg'),
                'github' => 'https://github.com/razvantaga/PHP/tree/main/Basic%20Web'
            ],
        ];

        $this->tabs = array_unique(Arr::flatten(Arr::pluck($this->items, 'category')));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.portfolio');
    }
}
