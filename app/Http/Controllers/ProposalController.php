<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;
use App\Http\Resources\ProposalResource;

class ProposalController extends Controller
{
    public function index() {
        return ProposalResource::collection(Proposal::all());
    }
}
