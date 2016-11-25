<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function index() {
    	$post = Post::all();
    	$posts = Post::orderBy('created_at', 'desc')->paginate(count($post));
    	return view('auth.index')->withPosts($posts);
    }
    public function option() {
    	return view('auth.option');
    }
}
