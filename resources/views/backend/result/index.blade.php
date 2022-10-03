
@extends('backend.layouts.master')
@section('title','All Quiz')
@section('content')



    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h3>User Exam</h3>
                    <a class="float-right" href="{{route('exam.create')}}"><button class=" btn-inverse float-end "  style="float: right;margin-top: -23px;" >Create Exam</button></a>
                </div>
                <div class="module-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> Name</th>
                            <th>Quiz</th>

                            <th>View Question</th>
                            <th>View Result </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $quiz)
                        <tr>


                            @foreach($quiz ->users as   $key=>$user)
                                <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$quiz->name}}</td>
                            <td>
                                <a class="float-right" href="{{route('quiz.show',$quiz->id)}}" >
                                    <button class="btn btn-inverse ">View Question</button></a>



                            </td>
                                <td>

                                    <a href=" ">
                                        <button class="btn btn-success">view Result </button></a>

                                </td>


                        </tr>
                        @endforeach
                        @endforeach

                        </tbody>
                    </table>
                    <!-- Modal -->


                </div>
            </div><!--/.module-->

            <br />

        </div><!--/.content-->
    </div><!--/.span9-->







@endsection
