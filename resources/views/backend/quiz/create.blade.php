@extends('backend.layouts.master')
@section('title','Create quiz')
@section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif


            <form action="{{route('quiz.store')}}" class="form-control" method="post">@csrf
            <div class="module">
                <div class="module-head">
                    <h3>Create Quiz</h3>
                </div>
                <div class="module-body">
                  <div class="control-group">
                      <label for=""class="control-label">Quiz Name</label>
                      <div class="controls">
                          <input type="text" name="name" class="span8" placeholder="name of a quiz" value="{{old('name')}}">
                          <br> @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong class="">{{$message}}</strong>
                          </span>
                          @enderror
                      </div>

                      <label for=""class="control-label">Quiz Description</label>
                      <div class="controls">
                          <textarea type="text" name="description" class="span8" placeholder="description of a quiz" value="{{old('description')}}"></textarea>
                          <br> @error('description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>


                      <label for=""class="control-label">Quiz Time</label>
                      <div class="controls">
                          <input type="text" name="minutes" class="span8" placeholder="minutes of a quiz" value="{{old('minutes')}} ">
                          <br> @error('minutes')
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
