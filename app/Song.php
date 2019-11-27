<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name'];

    public function band() {
        return $this->belongsTo('\App\Band', 'band_id');
    }
}
