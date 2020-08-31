<?php

namespace App\View\Components;

use App\Plugin;
use Illuminate\View\Component;

class ReleasesTable extends Component
{
    public $plugin;

    /**
     * Create a new component instance.
     *
     * @param Plugin $plugin
     */
    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.releases-table');
    }
}
