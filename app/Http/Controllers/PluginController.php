<?php

namespace App\Http\Controllers;

use App\Plugin;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function show(Plugin $plugin)
    {
        return view('plugins.show', ['plugin' => $plugin]);
    }
}
