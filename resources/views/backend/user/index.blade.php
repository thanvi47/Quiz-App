
@extends('backend.layouts.master')
@section('title','All User')
@section('content')



    <div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success"> <b>{{Session::get('message')}}</b></div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h3>All Quiz</h3>
                    <a class="float-right" href="{{route('user.create')}}"><button class=" btn-inverse float-end "  style="float: right;margin-top: -23px;" >Create User</button></a>
                </div>
                <div class="module-body">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Occupation</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Edit</th>

                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($users as $key=>$user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->visible_password}}</td>
                            <td>{{$user->occupation}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <a class="float-right" href="{{route('user.edit',$user->id)}}" >
                                    <button class="btn btn-info ">Edit</button></a>



                            </td>



                            <td>

                                <form action="{{route('user.destroy',$user->id)}}" method="post">
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
