<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="card">
    <div class="container justify-content-center">
        <div class="col-lg-15">
        <div class="row justify-content-center mt-5">
            <div class="card-header">
                <h1 class="card-title">Register</h1>
            </div>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    <div class="card-body">
                @endif
                <form action="{{ route('register') }}" method="POST">
                @csrf
               <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="John Doe" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3 sm">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control form-control-sm" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <div class="d-grid">
                        <button class='btn btn-primary btn-sm'>Register</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
