<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Question;

class UserController extends Controller
{
    public function index() {
    	$users = User::all();
    	return view('user.index')->withUsers($users);
    }
    public function show($id) {
    	$user = User::find($id);
    	$questions = Question::all()->where('user_email', '=', $user->email);
    	return view('user.show')->withUser($user)->withQuestions($questions);
    }
}
