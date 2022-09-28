
@extends('backend.layouts.master')
@section('title','All Quiz')
@section('content')



    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module">
                <div class="module-head float-end">
                    <h3>All Question</h3>
                    <a class="float-right" style="float: right;margin-top: -25px;" href="{{route('question.create')}}"><button class="btn btn-inverse float-right">Create Question</button></a>
                </div>
                <div class="module-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> Question</th>
                            <th>Quiz</th>
                            <th>Created</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $key=>$question)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$question->question}}</td>
                            <td>{{$question->quiz->name}}</td>
                            <td>{{date('F ,d,Y',strtotime($question->created_at))}}</td>
                            <td>
                                <a href="{{route('question.show',$question->id)}}">
                                    <button class="btn btn-primary">View</button></a>
                            </td>
                            <td>
                                <a class="float-right" href="{{route('question.edit',$question->id)}}" >
                                    <button class="btn btn-warning ">Edit</button></a>



                            </td>


                            <td>

                                <form action="{{route('question.destroy',$question->id)}}" method="post">
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
                    <div class="pagination pagination-centered">

                        {{$questions->links()}} </div>
{{--            {{$questions->links()}}--}}

                </div>
            </div><!--/.module-->

            <br />

        </div><!--/.content-->
    </div><!--/.span9-->







@endsection
