<div class="wrapper">
    <div class="container">
        <div class="row">


            <div class="span3">
                <div class="sidebar">
                    <ul class="widget widget-menu unstyled">
                        <li class="active"><a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                            </a></li>
                        <li><a href="{{route('quiz.create')}}"><i class="menu-icon icon-bullhorn"></i>Quiz Create</a>
                        </li>
                        <li><a href="{{route('quiz.index')}}"><i class="menu-icon icon-inbox"></i>Quiz View
                            </a> </li>
                    </ul>
                        <ul class="widget widget-menu unstyled">
                        <li><a href="{{route('question.index')}}"><i class="menu-icon icon-tasks"></i>Qustion View
                                     </a></li>
                        <li><a href="{{route('question.create')}}"><i class="menu-icon icon-tasks"></i>Qustion Create
                                     </a></li>
                    </ul>

                     <ul class="widget widget-menu unstyled">
                        <li><a href="{{route('user.index')}}"><i class="menu-icon icon-tasks"></i>User View
                                     </a></li>
                        <li><a href="{{route('user.create')}}"><i class="menu-icon icon-tasks"></i>User Create
                                     </a></li>
                    </ul>
                    <ul class="widget widget-menu unstyled">
                        <li><a href="{{route('exam.create')}}"><i class="menu-icon icon-tasks"></i>Assign Exam
                                     </a></li>
                        <li><a href="{{route('exam.index')}}"><i class="menu-icon icon-tasks"></i>View User Exam
                                     </a></li>
                    </ul>
                    <ul class="widget widget-menu unstyled">
{{--                        <li><a href="{{route('exam.create')}}"><i class="menu-icon icon-tasks"></i>Assign Exam--}}
{{--                                     </a></li>--}}
                        <li><a href="{{url('result/')}}"><i class="menu-icon icon-bullhorn "></i>View Results
                                     </a></li>
                    </ul>
                    <!--/.widget-nav-->



                    <!--/.widget-nav-->
                    <ul class="widget widget-menu unstyled">




                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"> <i class="menu-icon icon-signout">  </i>

                                    {{ __('Logout') }}


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form></a> </li>
                    </ul>
                </div>
                <!--/.sidebar-->
            </div>

