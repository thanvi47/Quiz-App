@extends('backend.layouts.master')
{{--@extends('layouts.app')--}}
@section('title','Question')
@section('content')
    <div class="span9 ">
        <div class="content">
{{--            <div class="row justify-content-center">--}}
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                    <div class="module">
                <div class='module-body ' >
                    <table class='table table-striped'>
                        <thead>
                        <th>#</th>
                        <th>Quiz Name</th>
                       <th>Total Question</th>
                        <th>Attempt Question</th>
                        <th>Correct Answer</th>
                        <th>Wrong Answer</th>
                        <th>Percentage</th>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $key=>$quiz)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    {{$quiz->name}}

                                </td>
                                <td>
                                    {{$totalQuestions}}
                                </td>
                                <td>
                                    {{$attemptedQuestions}}
                                </td>
                                <td>
                                    {{$userCorrectAnswers}}
                                </td>
                                <td>
                                    {{$userWrongAnswers}}
                                </td>
                                <td>
                                    {{round($percentage,2)}}
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>




                    <table class='table table-striped'>
                        <thead>
                        <th>#</th>

                       <th>Question</th>

                        <th>Answer</th>
                        <th>Result </th>
{{--                        <th>Percentage</th>--}}
                        </thead>
                        <tbody>
                        @foreach($results as $key=>$result)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    {{$result->question->question}}

                                </td>
                                <td>
                                    {{$result->answer->answer}}
                                </td>
                                @if($result->answer->is_correct)
                                    <td>
                                        <span class="badge badge-success" >Correct</span>
                                    </td>
                                @else
                                <td>
                                    <span class="badge badge-danger" style="color: #ffff ;background:#ce2916;">Wrong</span>
                                </td>
                                @endif



                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
{{--            </div>--}}
        </div>
    </div>


@endsection
