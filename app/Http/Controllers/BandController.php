<?php

namespace App\Http\Controllers;

use App\Band;
use Illuminate\Http\Request;
use App\Http\Resources\BandResource;
use Rennokki\Larafy\Larafy;

class BandController extends Controller
{
    private $spotify;
    public function __construct()
    {
        $this->spotify = new Larafy();
    }
    public function index() {
        return BandResource::collection(Band::all());
    }

    public function getBand(string $slug) {
        $band = Band::where('slug', $slug)->first();
        $resource = new BandResource($band);
        $result = [];
        $spotify_result = $this->spotify->searchArtists($slug)->items[0];
        $result['spotify_albums'] = $band->getSpotifyAlbums($spotify_result->id);
        $result['spotify_meta'] = $spotify_result;
        $result['stringshare_meta'] = $resource;
        return response(['data' => $result], 200);
    }
}
