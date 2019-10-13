<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = ['name', 'logo'];
    public function manager() {
        return $this->belongsTo('\App\User');
    }

    public function genres() {
        return $this->belongsToMany('\App\Genre');
    }
}
