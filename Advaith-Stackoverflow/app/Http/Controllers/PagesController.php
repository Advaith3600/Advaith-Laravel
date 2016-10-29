<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;

class PagesController extends Controller
{
    public function getHome() {
    	$questions = Question::orderBy('created_at', 'desc')->paginate(10);
    	return view('Pages.home')->withQuestions($questions);
    }
    public function goHome() {
    	return redirect()->route('home');
    }
}
