@extends('backend.layouts.master')
@section('title','Update Question')
@section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif


            <form action="{{route('question.update',$question->id)}}" class="form-control" method="post">@csrf @method('PUT')
                <div class="module">
                    <div class="module-head">
                        <h3>Update Question</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label for=""class="control-label">Choose Quiz</label>
                            <div class="controls">

                                <select name="quiz" id="" class="span8 ">
                                    @foreach(\App\Models\Quiz::all() as $quiz)
                                        <option value="{{$quiz->id}}"
                                        @if($quiz->id==$question->quiz_id) selected @endif>{{$quiz->name}}</option>
                                    @endforeach
                                </select>

                                <br> @error('quiz')
                                <span class="invalid-feedback" role="alert">
                              <strong class="">{{$message}}</strong>
                          </span>
                                @enderror
                            </div>

                            <label for=""class="control-label">Question Name </label>
                            <div class="controls">
                                <input type="text" name="question" class="span8" placeholder="name of a quiz" value="{{$question->question}}">
                                <br> @error('question')
                                <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                                @enderror
                            </div>
                            <label for=""class="control-label">Options </label>
                            <div class="controls">
                                @foreach($question->answers as $key=>$answer )
                                    <input type="text" name="options[]" class="span7" placeholder="name of a quiz" value="{{$answer->answer}}">


                                    @error('options[]')
                                    <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                                    @enderror
                                    <input type="radio" name="correct_answer"value="{{$key}}" @if($answer->is_correct){{'checked'}} @endif> <span> Is Correct Answer</span>
                                @endforeach
                                <br> @error('correct_answer')
                                <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                                @enderror

                            </div>




                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>










@endsection
