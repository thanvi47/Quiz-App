
@extends('backend.layouts.master')
@section('title','All Quiz')
@section('content')



    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            @foreach($quizes as $key=>$quiz)
            <div class="module">
                <div class="module-head">


                    <h3> <b> {{$quiz->name}} </b></h3>

                </div>
                <div class="module-body">
                    @foreach($quiz->questions as $key=>$question)
                    <table class="table table-striped">

                        <tbody>

                        <tr>
                            <h4>{{$question->question}}</h4>


                            <td>
                                @foreach($question->answers as $key=>$answer)
                              <b>{{$key+1}}.</b>  {{$answer->answer}} @if($answer->is_correct)
                                <span class="badge badge-success">

                                        <b>Correct</b>

                                </span>@endif
                                        <br>
                                @endforeach
                            </td>




                        </tr>
                            <tr>
                                <td>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <!-- Modal -->
        @endforeach
                        <a href="{{route('quiz.index')}}"> <button class="btn-primary">Back</button></a>
                </div>
            </div><!--/.module-->

            <br />
     @endforeach
        </div><!--/.content-->
    </div><!--/.span9-->







@endsection
