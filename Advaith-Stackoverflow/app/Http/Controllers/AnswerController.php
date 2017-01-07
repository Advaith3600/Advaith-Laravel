<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use App\User;
use Auth;
use Session;

class AnswerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question_id)
    {
        $this->validate($request, ['answer' => 'required|min:10']);
        $question = Question::find($question_id);
        $answer = new Answer;
        $answer->answer = $request->answer;
        $answer->user_id = Auth::user()->id;
        $answer->question_id = $question_id;
        $user = User::find(Auth::user()->id);
        $user->reputation = Auth::user()->reputation + 10;

        $answer->save();
        $user->save();
        Session::flash('success', 'Answer was successfully posted');
        return redirect()->route('questions.show', [$question->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::find($id);
        return view('answers.edit')->withAnswer($answer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['answer' => 'required|min:10']);
        $question = $request->question;
        $answer = Answer::find($id);
        $answer->answer = $request->answer;

        $answer->save();
        Session::flash('success', 'Answer was successfully updated');
        return redirect()->route('questions.show', [$question]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::find($id);
        $question = $answer->question_id;
        $answer->delete();

        Session::flash('success', 'Your answer was successfully deleted');
        return redirect()->route('questions.show', [$question]);
    }

    public function delete($id) {
        $answer = Answer::find($id);
        return view('answers.delete')->withAnswer($answer);
    }
}
