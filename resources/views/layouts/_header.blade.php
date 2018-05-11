<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/admins') }}">
               西迁纪念馆预约审核系统
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @auth('admin')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('admins.check') }}">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    审核系统
                                </a>
                            </li>
                            @if(Auth::guard('admin')->user()->super == true)
                                <li>
                                    <a href="{{ route('admin.create') }}">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        创建管理员用户
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.index') }}">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        管理管理员用户
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                    退出登录
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">登录</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
