<?php

namespace App\Http\Controllers;

use App\Plugin;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function create()
    {
        return view('plugins.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plugin-name' => 'required|string|max:128',
            'plugin-description' => 'string|nullable',
            'plugin-category' => 'required|exists:categories,id',
        ]);

        $plugin = new Plugin([
            'name' => $validatedData['plugin-name'],
            'description' => $validatedData['plugin-description'] ?? '',
            'user_id' => \Auth::id(),
            'category_id' => $validatedData['plugin-category'],
        ]);
        $plugin->save();

        return redirect()->route('plugins.show', ['plugin' => $plugin]);
    }

    public function show(Plugin $plugin, $page = null)
    {
        if ($page == null)
            return view('plugins.show', ['plugin' => $plugin]);
        else if ($page == 'releases')
            return view('plugins.releases.show', ['plugin' => $plugin]);
        else
            return view('plugins.show', ['plugin' => $plugin]);
    }

    public function edit(Plugin $plugin)
    {
        if (\Auth::user() == $plugin->user)
        {
            return view('plugins.edit', ['plugin' => $plugin]);
        }
        else
        {
            return redirect()->route('plugins.show', ['plugin' => $plugin]);
        }
    }

    public function update(Request $request, Plugin $plugin)
    {
        $validatedData = $request->validate([
            'plugin-name' => 'required|string|max:128',
            'plugin-description' => 'string|nullable',
            'plugin-category' => 'required|exists:categories,id',
        ]);

        if (\Auth::user() == $plugin->user)
        {
            $plugin->update([
                'name' => $validatedData['plugin-name'],
                'description' => $validatedData['plugin-description'] ?? '',
                'category_id' => $validatedData['plugin-category'],
            ]);

            $plugin->save();

            return redirect()->route('plugins.show', ['plugin' => $plugin]);
        }
        else
        {
            return redirect()->route('plugins.show', ['plugin' => $plugin]);
        }
    }
}
