@extends('layouts.app')
@section('title','All Quiz')
@section('content')
<div class="container">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="row justify-content-center">

                @if($isExamAssigned)
            @foreach($quizzes as $quiz)
                <div class="card-body m-2">
                    @if(Session::has('error'))
                        <div class="alert alert-warning">
                            {{Session::get('error')}}
                        </div>
                    @endif
                        <h3>{{$quiz->name}}</h3>
                    <p>{{$quiz->description}}</p>
                    <p>Duration: {{$quiz->minutes}} Minutes </p>
                    <p>Total Question: {{$quiz->questions->count()}}</p>
                    <a>
                        @if(!in_array($quiz->id,$wasQuizCompleted))
{{--                            <a href="{{route('examquiz',$quiz->id)}}" class="btn btn-primary">Start Quiz</a>--}}
                            <a href="/examquiz/{{$quiz->id}}" class="btn btn-primary">Start Quiz</a>
                            @else
                            <a href="/result/user/{{auth()->user()->id}}/quiz/{{$quiz->id}}">View Result</a>
                      <b> <span class="float-end text-success">Completed</span></b>
                        @endif
                    </p>

                </div>
            @endforeach
                    @else
                <b>You Have Not Assigned Any Exam</b>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
