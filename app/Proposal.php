<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = ['band_id', 'venue_id'];
    
    public function band() {
        return $this->belongsTo('\App\Band');
    }
    public function venue() {
        return $this->belongsTo('\App\Venue');
    }
}
