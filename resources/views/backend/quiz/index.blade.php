
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
                    <h3>All Quiz</h3>
                    <a class="float-right" href="{{route('quiz.create')}}"><button class="btn btn-outline-secondary float-end">Create Quiz</button></a>
                </div>
                <div class="module-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> Name</th>
                            <th>Description</th>
                            <th>Minutes</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $key=>$quiz)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$quiz->name}}</td>
                            <td>{{$quiz->description}}</td>
                            <td>{{$quiz->minutes}}</td>
                            <td>
                                <a class="float-right" href="{{route('quiz.edit',$quiz->id)}}" >
                                    <button class="btn btn-secondary ">Edit</button></a>



                            </td>


                            <td>


                                    <button  onclick="alert('Are you Sure ?')" type="submit" class="btn btn-danger">Delete</button>



                            </td>

                        </tr>
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
