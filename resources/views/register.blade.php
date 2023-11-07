<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="card-header">
                <h1 class="card-title">Register</h1>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="John Doe" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <div class="d-grid">
                        <button class='btn btn-primary btn-sm'>Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
