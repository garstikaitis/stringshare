<?php

namespace App\Http\Controllers;

use App\Band;
use App\Venue;
use App\Proposal;
use Illuminate\Http\Request;
use App\Http\Resources\ProposalResource;

class ProposalController extends Controller
{
    public function index() {
        return ProposalResource::collection(Proposal::all());
    }

    public function createProposal() {
        try {
            $proposal = new Proposal();
            $proposal->band_id = request('band');
            $proposal->venue_id = request('venue');
            $proposal->save();
            return response()->json(['success' => true, 'message' => 'Successfuly booked', 'update' => $proposal]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong', 'debug' => $e->getMessage()], 500);
        }
    }
}
