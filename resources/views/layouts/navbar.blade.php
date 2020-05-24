<div class="container-fluid bar">
    <nav class="navbar navbar-expand-lg navbar-light container">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
        <i class="fas fa-film"></i>
        Movie Library
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @if(Auth::user() && Auth::user()->hasRole('admin'))
                    <a href="{{url('admin')}}" class="nav-link text-white">Admin Panel</a> @endif
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if(Auth::check())
        <i class="fa fa-user-shield fa-sm"></i>
        {{ucfirst(Auth::user()->name)}}
        @else
          Member
        @endif
        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::check())
                        <a class="dropdown-item" href="/logout">logout</a> @else
                        <a class="dropdown-item" href="/login">Login</a>
                        <a class="dropdown-item" href="/register">Register</a> @endif
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
