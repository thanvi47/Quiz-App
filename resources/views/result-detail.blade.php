@extends('layouts.app')
@section('title','All Quiz')
@section('content')
    <div class="container">

        <div class="col-md-8">
            @foreach($results as $key=>$result)
            <div class="card">

                <div class="card-header"><h5>{{$key+1 }}. {{$result->question->question}}</h5></div>
                <div class="row justify-content-center">
                    <div class="card-body m-2">


                        @php
                        $i=1;
                        $answers=DB::table('answers')->where('question_id',$result->question->id)->get();
                        foreach ($answers as $answer){
                             echo $i++ .') '.$answer->answer.'<br>';
                        }
                        @endphp
                        <b>Your Answer : </b>{{$result->answer->answer}}
                        @php
                        $correctAnswer=DB::table('answers')->where('question_id',$result->question->id)->where('is_correct',1)->get();
                        foreach ($correctAnswer as $correct){
                            echo '<br><b>Correct Answer : </b>' .$correct->answer;
                        }
                        @endphp
                        @if($result->answer->is_correct)
                            <b class=""> <span class="badge badge-success" style=" color: #ffff ;background:#084f03;"> Correct</span></b>
                        @else
                           <span class="badge" style=" color: #ffff ;background:#ce2916;"> <b> Wrong</b></span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
