<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PluginRelease extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exiled_version', 'plugin_version', 'download_url', 'plugin_id',
    ];

    public function plugin()
    {
        return $this->belongsTo(Plugin::class);
    }
}
