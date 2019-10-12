<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;
use App\Http\Resources\BandResource;

class BandController extends Controller
{
    public function index() {
        return BandResource::collection(Band::all());
    }
}
