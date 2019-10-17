<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;
use App\Http\Resources\VenueResource;

class VenueController extends Controller
{
    public function index() {
        return VenueResource::collection(Venue::all());
    }
}
