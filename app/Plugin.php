<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plugin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'user_id', 'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function releases()
    {
        return $this->hasMany(PluginRelease::class);
    }

    public function getLatestRelease()
    {
        return $this->releases->sortByDesc('created_at')->first();
    }

    public function getRouteKeyName()
    {
        return 'url_string';
    }

    public function scopeWithLastReleaseExiledVersion($query)
    {
        $query->addSelect(['last_exiled_version' => PluginRelease::select('exiled_version')
            ->whereColumn('plugin_id', 'plugins.id')
            ->orderBy('created_at', 'desc')
            ->limit(1)
        ]);
    }

    public function scopeWithLastReleaseDate($query)
    {
        $query->addSelect(['last_release_date' => PluginRelease::select('created_at')
            ->whereColumn('plugin_id', 'plugins.id')
            ->orderBy('created_at', 'desc')
            ->limit(1)
        ]);
    }

    public function scopeWithDownloads($query)
    {
        $query->addSelect((DB::raw('(select SUM(`downloads`) as downloads from plugin_releases where `plugin_id` = plugins.id) as `downloads`')))->get();
    }
}
