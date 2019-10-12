<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    public function manager() {
        return $this->belongsTo('\App\User');
    }
}
