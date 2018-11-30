<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
			@if (Route::has('login'))
				@auth
            <ul class="nav navbar-nav">
                &nbsp;
				<li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('posts.index')}}">Posts</a></li>
                <li><a href="{{route('tags.index')}}">Tags</a></li>
                <li><a href="{{route('category.index')}}">Category</a></li>
				@if(auth()->user()->level == 'admin')
				<li><a href="{{route('listuser.index')}}">List Users</a></li>
				@endif
            </ul>
				@endauth
			@endif
            <form action="{{route('search')}}" class="navbar-form navbar-left" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <button class="btn btn-default" type="submit">Search</button>
            </form>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @else
					@if(auth()->user()->level == 'admin' || auth()->user()->level == 'author')
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							@if(auth()->user()->level == 'author')
							<li><a href="{{route('posts.create')}}">Create Post</a></li>
							<li><a href="{{route('category.create')}}">Create Category</a></li>
							<li><a href="{{route('tags.create')}}">Create Tag</a></li>
							@elseif(auth()->user()->level == 'admin')
							<li><a href="{{route('listuser.index')}}">List User</a></li>
							@endif
						</ul>
					</li>
					@endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
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
                @endguest
            </ul>
        </div>
    </div>
</nav>
