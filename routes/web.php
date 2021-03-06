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
    return redirect(\route('plugins.index'));
    //return view('welcome');
});
Auth::routes(['verify' => true]);

Route::get('login/steam', 'Auth\SteamAuthController@login')->name('authenticate.steam');

Route::get('login/discord', 'Auth\LoginController@redirectToDiscord')->name('authenticate.discord');
Route::get('login/discord/callback', 'Auth\LoginController@handleDiscordCallback')->name('authenticate.discord.callback');

Route::get('login/github', 'Auth\LoginController@redirectToGithub')->name('authenticate.github');
Route::get('login/github/callback', 'Auth\LoginController@handleGithubCallback')->name('authenticate.github.callback');

Route::middleware(['auth'])->group(function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::get('plugins/create', 'PluginController@create')->name('plugins.create');
    Route::post('plugins', 'PluginController@store')->middleware('throttle:3,5')->name('plugins.store');
    Route::get('plugins/{plugin}/edit', 'PluginController@edit')->name('plugins.edit');
    Route::put('plugins/{plugin}', 'PluginController@update')->name('plugins.update');

    Route::get('plugins/{plugin}/releases/create', 'PluginReleaseController@create')->name('plugin-releases.create');
    Route::post('plugins/{plugin}/releases', 'PluginReleaseController@store')->middleware('throttle:10,5')->name('plugin-releases.store');
});

Route::get('plugins', function () {
    $plugins = \App\Plugin::orderBy('verified', 'desc')
        ->orderBy('last_release_date', 'desc')
        ->withLastReleaseDate()
        ->paginate(25);
    return view('plugins.index')->with(['plugins' => $plugins]);
})->name('plugins.index');

Route::get('plugins/categories/{category}', function ($category) {
    $plugins = \App\Plugin::where('category_id', '=', $category)
        ->orderBy('verified', 'desc')
        ->orderBy('last_release_date', 'desc')
        ->withLastReleaseDate()
        ->paginate(25);
    return view('plugins.index')->with(['plugins' => $plugins]);
})->name('plugins.index.category.show');

Route::get('plugins/{plugin}', 'PluginController@show')->name('plugins.show');

Route::get('plugins/{plugin}/{page}', 'PluginController@show')->name('plugins.show.page');

Route::get('releases/{pluginRelease}', 'PluginReleaseController@show')->name('plugin-releases.show');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
