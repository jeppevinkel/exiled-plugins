<?php

namespace App\Http\Controllers;

use App\Plugin;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function show(Plugin $plugin, $page = null)
    {
        if ($page == null)
            return view('plugins.show', ['plugin' => $plugin]);
        else if ($page == 'releases')
            return view('plugins.releases.show', ['plugin' => $plugin]);
        else
            return view('plugins.show', ['plugin' => $plugin]);
    }
}
