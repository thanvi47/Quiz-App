
@extends('backend.layouts.master')
@section('title','Create quiz')
@section('content')



    <div class="span9">
        <div class="content">

            <div class="module">
                <div class="module-head">
                    <h3>All Quiz</h3>
                    <a class="float-right" href="{{route('quiz.create')}}">     <button class="btn btn-outline-secondary float-end">Create Quiz</button></a>
                </div>
                <div class="module-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> Name</th>
                            <th>Description</th>
                            <th>Minutes</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $key=>$quiz)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$quiz->name}}</td>
                            <td>{{$quiz->description}}</td>
                            <td>{{$quiz->minutes}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div><!--/.module-->

            <br />

        </div><!--/.content-->
    </div><!--/.span9-->







@endsection
