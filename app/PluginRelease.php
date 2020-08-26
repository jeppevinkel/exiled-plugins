<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PluginRelease extends Model
{
    public function plugin()
    {
        return $this->belongsTo(Plugin::class);
    }
}
