<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
use Session;
use App\Tag;
use Auth;
use App\Answer;

class QuestionController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show', 'slug']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);
        return view('questions.index')->withQuestions($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('questions.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'title'   => 'required|max:255|unique:questions,title',
                'question'=> 'required|min:10',
                'tags'    => 'required',
                'slug'    => 'alpha_dash'
            ]);
        $question = new Question;
        $question->title = $request->title;
        $question->question = $request->question;
        $question->user_id = Auth::user()->id;
        $question->slug = $request->slug;
        $question->save();
        $question->tags()->sync($request->tags, false);

        Session::flash('success', 'Your question was successfully created');
        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return redirect()->route('questions.slug', [$id, $question->slug]);
    }
    public function slug($id, $slug) {
        $question = Question::find($id);
        if ($slug != $question->slug) {
            return redirect()->route('questions.slug', [$id, $question->slug]);
        }
        return view('questions.show')->withQuestion($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('questions.edit')->withQuestion($question)->withTags($tags2);
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
        $this->validate($request, [
                'title'   => "required|max:255|unique:questions,title,$id",
                'question'=> 'required|min:10',
                'tags'    => 'required',
                'slug'    => 'alpha_dash'
            ]);
        $question = Question::find($id);
        $question->title = $request->title;
        $question->question = $request->question;
        $question->save();
        $question->tags()->sync($request->tags);

        Session::flash('success', 'Your question was successfully created');
        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->tags()->detach();
        $question->delete();

        Session::flash('success', 'Your Question has been successfully deleted');
        return redirect()->route('questions.index');
    }

    public function delete($id) {
        $question = Question::find($id);
        return view('questions.delete')->withQuestion($question);
    }
}
