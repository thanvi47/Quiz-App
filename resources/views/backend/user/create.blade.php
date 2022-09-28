@extends('backend.layouts.master')
@if(isset($user))
    @section('title','Edit User')
    @else
@section('title','Create User')
    @endif
@section('content')

    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif


            <form action="@if(isset($user)) {{route('user.update',$user->id)}} @else {{route('user.store')}} @endif" class="form-control" method="post">@csrf
                @if(isset($user))
                    @method('PUT')  @endif
            <div class="module">
                <div class="module-head">
                    @if(isset($user))
                        <h3>Edit User</h3>
                    @else
                    <h3>Create User</h3>
                    @endif
                </div>
                <div class="module-body">
                  <div class="control-group">
                      <label for=""class="control-label"> Name</label>
                      <div class="controls">
                          <input type="text" name="name" class="span8 @error('name')is-invalid @enderror" placeholder="name" value=" @if(isset($user)) {{$user->name}}    @else{{old('name')}}   @endif">
                          <br> @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong class=" " style="color: maroon;">{{$message}}</strong>
                          </span>
                          @enderror
                      </div>

                      <label for=""class="control-label">Email</label>
                      <div class="controls">
                          <input type="text" name="email" class="span8" placeholder="user@gmail.com" value="@if(isset($user)) {{$user->email}}     @else {{old('email')}} @endif">
                          <br> @error('email')
                          <span class="invalid-feedback"  role="alert">
                              <strong style="color: maroon;">{{$message}}</strong>
                          </span>
                          @enderror
                      </div>


                      <label for=""class="control-label">Password</label>
                      <div class="controls">

                          <input type="text" name="password" class="span8" value=" @if(isset($user)) {{$user->visible_password}}  @else {{old('password')}} @endif" >
                          <br> @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong style="color: maroon;">{{$message}}</strong>
                          </span>
                          @enderror
                      </div>

                      <label for=""class="control-label">Occupation</label>
                      <div class="controls">
                          <input type="text" name="occupation" class="span8 " placeholder="student" value="@if(isset($user)) {{$user->occupation}}     @else {{old('occupation')}} @endif ">
                          <br> @error('occupation')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>

                      <label for=""class="control-label">Address</label>
                      <div class="controls">
                          <input type="text" name="address" class="span8 " placeholder="" value="@if(isset($user)) {{$user->address}}     @else {{old('address')}} @endif">
                          <br> @error('address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                      </div>

                      <label for=""class="control-label">Phone</label>
                      <div class="controls">
                          <input type="text" name="phone" class="span8 " placeholder="" value="@if(isset($user)) {{$user->phone}}     @else {{old('phone')}} @endif">
                          <br> @error('phone')
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
