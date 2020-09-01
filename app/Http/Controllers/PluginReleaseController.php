<?php

namespace App\Http\Controllers;

use App\Plugin;
use App\PluginRelease;
use Illuminate\Http\Request;

class PluginReleaseController extends Controller
{
    public function create(Plugin $plugin)
    {
        return view('plugins.releases.create', ['plugin' => $plugin]);
    }

    public function store(Request $request, Plugin $plugin)
    {
        if (\Auth::user() != $plugin->user)
        {
            return redirect()->route('plugins.show.page', ['plugin' => $plugin, 'page' => 'releases']);
        }

        $validatedData = $request->validate([
            'exiled-version' => 'required|string|max:32',
            'plugin-version' => 'required|string|max:32',
            'download-url' => 'required|url',
        ]);

        $pluginRelease = new PluginRelease([
            'exiled_version' => $validatedData['exiled-version'],
            'plugin_version' => $validatedData['plugin-version'],
            'download_url' => $validatedData['download-url'],
            'plugin_id' => $plugin->id,
        ]);
        $pluginRelease->save();

        return redirect()->route('plugins.show.page', ['plugin' => $plugin, 'page' => 'releases']);
    }

    public function show(PluginRelease $pluginRelease)
    {
        $pluginRelease->increment('downloads');
        return redirect()->away($pluginRelease->download_url);
    }
}
