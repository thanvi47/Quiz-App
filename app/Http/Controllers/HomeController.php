<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect('/');
        }
        $authUser=auth()->user()->id;
        $assignedQuizId =[];
        $user=DB::table('quiz_users')->where('user_id',$authUser)->get();
        foreach ($user as $u) {
        array_push($assignedQuizId,$u->quiz_id);

        }
        $quizzes=Quiz::WhereIn('id',$assignedQuizId)->get();
        $isExamAssigned=DB::table('quiz_users')->where('user_id',$authUser)->exists();
        $wasQuizCompleted=Result::Where('user_id',$authUser)->WhereIn('quiz_id',(new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();
        return view('home',compact('quizzes','isExamAssigned','wasQuizCompleted'));


//        return view('home');
    }
}
