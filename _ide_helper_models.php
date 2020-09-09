<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Plugin[] $plugins
 * @property-read int|null $plugins_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\Plugin
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $user_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $url_string
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PluginRelease[] $releases
 * @property-read int|null $releases_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin whereUrlString($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plugin whereUserId($value)
 */
	class Plugin extends \Eloquent {}
}

namespace App{
/**
 * App\PluginRelease
 *
 * @property int $id
 * @property string $exiled_version
 * @property string $plugin_version
 * @property string $download_url
 * @property int $downloads
 * @property int $plugin_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Plugin $plugin
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease query()
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease whereDownloadUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease whereDownloads($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease whereExiledVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease wherePluginId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease wherePluginVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PluginRelease whereUpdatedAt($value)
 */
	class PluginRelease extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\SteamAuth
 *
 * @property int $id
 * @property string $steam_id
 * @property int $user_id
 * @property string|null $avatar
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth query()
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth whereSteamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SteamAuth whereUserId($value)
 */
	class SteamAuth extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Plugin[] $plugins
 * @property-read int|null $plugins_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \App\SteamAuth|null $steamAuth
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

