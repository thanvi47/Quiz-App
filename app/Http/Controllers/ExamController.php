<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $quizzes=Quiz::all();

        return view('backend.exam.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.exam.assign');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'user_id'=>'required',
            'quiz_id'=>'required',
        ]);
        $quiz=(new Quiz)->assignExam($request->all());
        return redirect()->back()->with('message','Exam Assigned Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       $userId=$request->get('user_id');
         $quizId=$request->get('quiz_id');
         $quiz=Quiz::find($quizId);
         $resut=Result::where('user_id',$userId)->where('quiz_id',$quizId)->exists();
         if($resut){
                return redirect()->back()->with('message','Exam Already Taken');
            }else{
                $quiz->users()->detach($userId);
                return redirect()->back()->with('message','Exam Removed Successfully');
            }


    }
    public function getQuizQuestions(Request $request,$quizId){
    $authUser=auth()->user()->id;
    //check if user has been assignrd a particular quiz
        $userId=DB::table('quiz_users')->where('user_id',$authUser)->where('quiz_id',$authUser)->pluck('quiz_id')->toArray();
        if (in_array($quizId,$userId)) {
            return redirect()->to('/home')->with('error','You are not assigned to this quiz');
        }

    $quiz=Quiz::findOrFail($quizId);
    $time=Quiz::Where('id',$quizId)->value('minutes');
    $quizQuestions=Question::Where('quiz_id',$quizId)->with('answers')->get();
    $authUserHasPlayedQuiz=Result::Where(['user_id'=>$authUser,'quiz_id'=>$quizId])->get();

    //has user played particular quiz
        $wasCompleted =Result::where('user_id',$authUser)->whereIn('quiz_id',
            (new Quiz())->hasQuizAttempted())->pluck('quiz_id')->toArray();
        if (in_array($quizId,$wasCompleted)) {
            return redirect()->to('/home')->with('error','You have already played this quiz');
        }

    return view('exam.examquiz',compact('quizQuestions','quiz','time','authUserHasPlayedQuiz'));


    }
    public function postQuiz(Request $request){

    $questionId=$request['question_id'];
    $answerId=$request->get('answer_id');
    $quizId=$request->get('quiz_id');
    $userId=auth()->user()->id;
        return   $userQuestionAnswer=Result::UpdateOrCreate(
        ['user_id'=>$userId,'question_id'=>$questionId,'quiz_id'=>$quizId],
        ['answer_id'=>$answerId]
        );


    }
    public function viewResult($userId,$quizId){
        $results=Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
        return view('result-detail',compact('results'));

    }
    public function result(){
        $quizzes=Quiz::all();
        return view('backend.result.index',compact('quizzes'));
    }
    public function userQuizResult($userId,$quizId){
        $results=Result::where('user_id',$userId)->where('quiz_id',$quizId)->get();
        $totalQuestions=Question::where('quiz_id',$quizId)->count();
      $attemptedQuestions=Result::where('user_id',$userId)->where('quiz_id',$quizId)->count();
        $quiz=Quiz::where('id',$quizId)->get();
        $ans=[];
        foreach ($results as $answer){
            array_push($ans,$answer->answer_id);

        }
        $userCorrectAnswers=Answer::whereIn('id',$ans)->where('is_correct',1)->count();
        $userWrongAnswers=$totalQuestions-$userCorrectAnswers;
        $percentage=($userCorrectAnswers/$totalQuestions)*100;
        return view('backend.result.result',compact('results','totalQuestions','attemptedQuestions','userCorrectAnswers','userWrongAnswers','percentage','quiz'));
    }
}
