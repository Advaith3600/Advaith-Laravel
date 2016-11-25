<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	return view('pages.index');
    }
    public function guestlogin() {
    	return redirect('/');
    }
    public function authlogin() {
    	return redirect('/home');
    }
}
