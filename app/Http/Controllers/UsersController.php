<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.role:admin', ['only' => ['blockUser']]);
    }

    public function blockUser()
    {
        return 'This is an admin route.';
    }

    public function profile()
    {
        return 'This route is for all users.';
    }
}
