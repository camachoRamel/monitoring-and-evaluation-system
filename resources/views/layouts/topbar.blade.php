<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../../index3.html" class="nav-link">About</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            {{-- <a class="nav-link" href="{{ route('logout')}}" role="button">
              <p class="text-danger">
                Log out
              </p>
            </a> --}}
            <form action="{{ route('logout') }}" method="post" id="logout-form-2">
                @csrf
                <button type="submit" class="btn text-danger">Log out</button>
            </form>
          </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-settings" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
  </nav>
