<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  </head>
  <body>
    {{-- Awal Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ url('home') }}">Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link {{ request()->segment('1') == '' || request()->segment('1') == 'home' ?  'active' : '' }}" href="{{ url('home') }}">Home</a>
            </li>
            <li class="nav-item {{ request()->segment('1') == 'employees' ?  'active' : '' }}">
              <a class="nav-link" href="{{ url('employees') }}">Employee</a>
            </li>
          </ul>
        </div>
        <div class="ml-auto">
            <form action="{{ route('logout') }}" method="POST" class="d-flex" roles="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Logout</button>
            </form>
        </div>
      </div>
    </nav>
    {{-- Akhir Navbar --}}

    {{-- Content --}}
    <div class='mt-2'>
        @yield('content')
    </div>
    {{-- End Content --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

  </body>
</html>
