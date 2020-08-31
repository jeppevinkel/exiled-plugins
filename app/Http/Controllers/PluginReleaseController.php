<?php

namespace App\Http\Controllers;

use App\PluginRelease;
use Illuminate\Http\Request;

class PluginReleaseController extends Controller
{
    public function show(PluginRelease $pluginRelease)
    {
        $pluginRelease->increment('downloads');
        return redirect()->away($pluginRelease->download_url);
    }
}
