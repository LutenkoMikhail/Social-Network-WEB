<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-2">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Social network</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if ( Auth::check() )
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('friends.index')}}">Friends</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('friends.add')}}">Add as Friend</a>
                    </li>

                </ul>
            @endif
        </div>

        <ul class="navbar-nav ml-auto">
            @if ( Auth::check() )
                <li class="nav-item"><a href="#" class="nav-link">{{ Auth::user()->getNameOrUsername()}}</a></li>
                <li class="nav-item"><a href="{{route('auth.signout.get')}}" class="nav-link">Exit</a>
                </li>
            @else
                <li class="nav-item "><a href="{{route('auth.signup.get')}}" class="nav-link">Register</a></li>
                <li class=""><a href="{{route('auth.signin.get')}}" class="nav-link">Login</a></li>
        @endif


    </div>
</nav>



















