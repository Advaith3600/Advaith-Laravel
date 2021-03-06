<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use Auth;
use Session;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;

class PagesController extends Controller
{
    public function getHome() {
    	$questions = Question::orderBy('created_at', 'desc')->paginate(10);
    	return view('Pages.home')->withQuestions($questions);
    }
    public function goHome() {
    	return redirect()->route('home');
    }
    public function profile() {
    	return view('pages.profile');
    }
    public function profileEdit() {
        return view('pages.proEdit');
    }
    public function profileEditImg(Request $request, $id) {
        $this->validate($request, ['pro_pic' => 'required|image:png']);
        $user = User::find($id);
        $image = $request->file('pro_pic');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/comment/' . $filename);
        Image::make($image)->save($location);
        $user->pro_pic = "/images/comment/" . $filename;
        $user->save();

        Session::flash('success', 'Your profile picture was successfully updated');
        return redirect()->route('profile.index');
    }
    public function profileEditDetails(Request $request, $id) {
        $this->validate($request, ['name' => 'required']);
        $user = User::find($id);

        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->save();

        Session::flash('success', 'Your profile was successfully updated');
        return redirect()->route('profile.index');
    }
}
