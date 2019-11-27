<?php

namespace App;

use Rennokki\Larafy\Larafy;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'logo', 'slug'];
    public function manager() {
        return $this->belongsTo('\App\User');
    }

    public function genres() {
        return $this->belongsToMany('\App\Genre');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getSpotifyAlbums(string $spotify_id) {
        $api = new Larafy();
        return $api->getArtistAlbums($spotify_id)->items;
    }
}
