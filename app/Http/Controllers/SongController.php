<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use App\Http\Resources\SongResource;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function index(string $slug) {
        return SongResource::collection(Song::all());
    }
}
