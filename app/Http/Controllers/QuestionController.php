<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $questions=(new Question)->getQuestion();
    return view('backend.question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizes= Quiz::all();
       return view('backend.question.create',compact('quizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $this->validateForm($request);
//        dd($data);
        $question=(new Question())->storeQuestion($data);
        $a=$question->id;
        $answer = (new Answer())->storeAnswer($data,$a);
//        dd($answer);

        return redirect()->back()->with('message','Question created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = (new Question())->getQuestionById($id);
        return view('backend.question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question =(new Question())->findQuestion($id);
        return view('backend.question.edit' ,compact('question'));
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
        $data = $this->validateForm($request);
        ;
        $question=(new Question())->updateQuestion($id,$request->all());

        $answer = (new Answer())->updateAnswer($request->all(),$question);
        return redirect()->route('question.index')->with('message','Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Answer())->deleteAnswer($id);
        (new Question())->deleteQuestion($id);
        return redirect()->back()->with('message','Question deleted successfully');
    }
    public function validateForm($request){
        return $this->validate($request,[
           'quiz'=>'required',
           'question'=>'required',
           'options'=>'|required||',
           'options.*'=>'|required||',
            'correct_answer'=>'required'
        ]);
    }
}
