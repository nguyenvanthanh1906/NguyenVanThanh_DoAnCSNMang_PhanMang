<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Trang chủ
                                </a></li>
                                <li><a href="{{route('quiz.create')}}"><i class="menu-icon icon-bullhorn"></i>Tạo bài kiểm tra</a>
                                </li>
                                <li><a href="{{route('quiz.index')}}"><i class="menu-icon icon-inbox"></i>Tất cả bài kiểm tra <b class="label green pull-right">
                                    </b> </a></li>
                                
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('result')}}"><i class="menu-icon icon-bold"></i> Xem kết quả</a></li>
                               
                               
                            </ul>
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('question.index')}}"><i class="menu-icon icon-bold"></i> Tất cả câu hỏi </a></li>
                                <li><a href="{{route('question.create')}}"><i class="menu-icon icon-book"></i>Tạo câu hỏi</a></li>
                               
                            </ul>

                            <ul class="widget widget-menu unstyled">
                                <li><a href="{{route('view.exam')}}"><i class="menu-icon icon-bold"></i>Tất cả kì thi</a></li>
                                <li><a href="{{route('user.exam')}}"><i class="menu-icon icon-book"></i>Tạo kì thi</a></li>
                               
                            </ul>

                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                            <li><a href="{{route('user.create')}}"><i class="menu-icon icon-bullhorn"></i>Tạo User</a>
                                </li>
                                <li><a href="{{route('user.index')}}"><i class="menu-icon icon-bullhorn"></i>Tất cả User</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->