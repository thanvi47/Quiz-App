@extends('backend.layouts.master')
@extends('layouts.app')
@section('title','Question')
@section('content')
    <div class="span9 ">
        <div class="content">
{{--            <div class="row justify-content-center">--}}
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                    <div class="module">
                <div class='module-body ' >
                    <table class='table table-striped'>
                        <thead>
                        <th>
                            <h3>{{ $question->question }}</h3>
                        </th>
                        </thead>
                        <tbody>
                        @foreach($question->answers as $key=> $answer)
                            <tr>
                                <td >
                                    {{$key+1}}. {{$answer->answer}} @if($answer->is_correct)
                                        <span class="badge badge-success pull-right"><b>Correct</b></span>
                                    @endif
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
{{--            </div>--}}
        </div>
    </div>


@endsection
