<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
