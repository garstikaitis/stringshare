<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    public function band() {
        return $this->belongsTo('\App\Band');
    }
    public function venue() {
        return $this->belongsTo('\App\Venue');
    }
}
