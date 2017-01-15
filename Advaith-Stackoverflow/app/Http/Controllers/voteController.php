<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qvote;
use App\Question;
use App\Answer;
use App\User;
use App\Avote;

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
    public function avote(Request $request) {
        $avote = new Avote;
        $avote->user_id = $request->user_id;
        $avote->answer_id = $request->answer_id;
        $avote->save();

        $answer = Answer::find($request->answer_id);
        $user = User::find($answer->user->id);
        $user->reputation = $user->reputation + 10;
        $user->save();

        return $answer->avotes()->count();
    }
}
