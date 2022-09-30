@extends('layouts.app')
@section('title','All Quiz')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <example-component> </example-component>
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if($isExamAssigned)
            @foreach($quizzes as $quiz)
                <div class="card-body">

                        <h3>{{$quiz->name}}</h3>
                    <p>{{$quiz->description}}</p>
                    <p>Duration: {{$quiz->minutes}} Minutes </p>
                    <p>Total Question: {{$quiz->questions->count()}}</p>
                    <p>
                        @if(!in_array($quiz->id,$wasQuizCompleted))
{{--                            <a href="{{route('examquiz',$quiz->id)}}" class="btn btn-primary">Start Quiz</a>--}}
                            <a href="/examquiz/{{$quiz->id}}" class="btn btn-primary">Start Quiz</a>
                            @else
                        <span class="float-end">Completed</span>
                        @endif
                    </p>

                </div>
            @endforeach
                    @else
                <p>You Have Not Assigned Any Exam</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
