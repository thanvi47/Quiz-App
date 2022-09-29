<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;

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
}
