<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

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
}
