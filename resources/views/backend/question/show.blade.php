@extends('backend.layouts.master')
@section('title','Question')
@section('content')
    <div class="span8 ">
        <div class="container m-5 ">
            <div class="row justify-content-center">

                <div class='module-body table ms-5 p-5 ' style="padding:0px 40px;">
                    <table class='table table-message '>
                        <thead>
                        <th>
                            <h3>{{ $question->question }}</h3>
                        </th>
                        </thead>
                        <tbody>
                        @foreach($question->answer as $key=> $answer)
                            <tr class='read'>
                                <td class="cell-author hidden-phone hidden-tablet">
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
        </div>
    </div>


@endsection
