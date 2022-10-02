@extends('layouts.app')
@section('title','All Quiz')
@section('content')
    <div class="container">
        <div class="row justify-content-left">
             <div class="col-md-8">

                <div class="card ">

                    <div class="card-header">{{ __('Exam') }}</div>
                    <div class="row ">
                        <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-warning ">
                               ⚠ {{Session::get('error')}}
                            </div>
                        @endif</div>
                        @if($isExamAssigned)
                            @foreach($quizzes as $quiz)
                                <div class="card-body m-2">

                                    <h3>{{$quiz->name}}</h3>
                                    <p>{{$quiz->description}}</p>
                                    <p>Duration: {{$quiz->minutes}} Minutes </p>
                                    <p>Total Question: {{$quiz->questions->count()}}</p>

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
            <div class="col-md-4">


                    <div class="card ">
                        <div class="card-header">
                            <h5>User Profile</h5>
                        </div>
                        <div class="card-body">
                            <p>Name : {{auth()->user()->name}}</p>
                            <p>Email : {{auth()->user()->email}}</p>
                            <p>Occupation : {{auth()->user()->occupation}}</p>
                            <p>Address : {{auth()->user()->address}}</p>
                            <p>Phone : {{auth()->user()->phone}}</p>
                        </div>
                    </div>


            </div>
        </div>

    </div>

@endsection
