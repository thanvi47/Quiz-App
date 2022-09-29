@extends('backend.layouts.master')
@section('title','Create quiz')
@section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif


            <form action="{{route('exam.store')}}" class="form-control" method="post">@csrf
                <div class="module">
                    <div class="module-head">
                        <h3>Create Question</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label for=""class="control-label">Choose Quiz</label>
                            <div class="controls">

                                <select name="quiz_id" id="" class="span8 ">
                                    @foreach(\App\Models\Quiz::all() as $quiz)
                                        <option value="{{$quiz->id}}">{{$quiz->name}}</option>
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
                                <select name="user_id" id="" class="span8 ">
                                    @foreach(\App\Models\User::where('is_admin','0')->get() as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                <br> @error('question')
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
