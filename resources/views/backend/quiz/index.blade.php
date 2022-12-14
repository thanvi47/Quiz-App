
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
                    <a class="float-right" href="{{route('quiz.create')}}"><button class=" btn-inverse float-end "  style="float: right;margin-top: -23px;" >Create Quiz</button></a>
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
                            <th>View Question</th>
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
                                    <button class="btn btn-info ">Edit</button></a>



                            </td>
                            <td>
                                <a class="float-right" href="{{route('quiz.show',$quiz->id)}}" >
                                    <button class="btn btn-inverse ">View Question</button></a>



                            </td>


                            <td>

                                <form action="{{route('quiz.destroy',$quiz->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button  onclick="alert('Are you Sure ?')" type="submit" class="btn btn-danger">Delete</button>

                                </form>

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
