<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qvote;
use App\Question;
use App\User;

class voteController extends Controller
{
    public function qvote(Request $request) {
        $qvote = new Qvote;
        $qvote->user_id = $request->user_id;
        $qvote->question_id = $request->question_id;
        $qvote->save();

        $question = Question::find($request->question_id);
        $user = User::find($question->user->id);
        $user->reputation = $user->reputation + 10;
        $user->save();

        return $question->qvotes()->count();
    }
}
