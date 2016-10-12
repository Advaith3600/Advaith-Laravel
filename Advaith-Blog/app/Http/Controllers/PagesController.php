<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function getIndex() {
    	return view('pages.welcome');
    }
    public function getAbout() {
    	$first = "Advaith";
    	$last = "A J";
    	$fullname = $first . " " . $last;
    	$email = "advaitharunjeena@gmail.com";
    	$data = [];
    	$data['email'] = $email;
    	$data['fullname'] = $fullname;
    	return view('pages.about')->withData($data);
    }
    public function getContact() {
    	return view('pages.contact');
    }
}
