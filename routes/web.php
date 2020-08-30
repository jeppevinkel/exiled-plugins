<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(\route('plugin.index'));
    //return view('welcome');
});
Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', 'HomeController@index')->name('home');
});

Route::get('plugins', function () {
    $plugins = \App\Plugin::paginate(2);
    return view('plugins.index')->with(['plugins' => $plugins]);
})->name('plugin.index');

Route::get('plugins/categories/{category}', function ($category) {
    $plugins = \App\Plugin::where('category_id', '=', $category)->paginate(2);
    return view('plugins.index')->with(['plugins' => $plugins]);
})->name('plugin.index.category.show');

Route::get('plugins/{plugin}', 'PluginController@show')->name('plugin');
