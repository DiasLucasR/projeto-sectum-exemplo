<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller {
    public function index() {
        $users = User::all();
        return response(json_encode($users), 200);
    }
}