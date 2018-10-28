
<nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('index') }}">My Blog</a>
            </div>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('aboutpage') }}">About</a>
                    </li>
                    <li>
                        <a href="{{ route('contactpage') }}">Contact</a>
                    </li> 
                    <li>
                        <a href="/posts">Posts</a>
                    </li>                                
                </ul>
                        <!-- Right Side Of Navbar -->
               <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                    @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="/posts/create">
                                                <i class="fas fa-plus"></i>Write Post
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('home') }}">
                                                <i class="fas fa-gear"></i>
                                                Admin
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                    </li>
                     @endif
                </ul>            
    
        </div><!-- /.navbar-collapse -->
    </nav>
    