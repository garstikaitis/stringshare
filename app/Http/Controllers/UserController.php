<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index() {
        return UserResource::collection(User::all());
    }

    public function getUser(int $id) {
        return response(['user' => new UserResource(User::find($id))], 200);
    }
}
