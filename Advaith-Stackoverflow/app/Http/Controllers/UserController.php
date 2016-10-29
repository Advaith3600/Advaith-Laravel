<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function index() {
    	$users = User::all();
    	return view('user.index')->withUsers($users);
    }
    public function show($id) {
    	$user = User::find($id);
    	return view('user.show')->withUser($user);
    }
}
