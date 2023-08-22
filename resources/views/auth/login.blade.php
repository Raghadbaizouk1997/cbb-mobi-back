<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body>
    <br>
    <br>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-1">
                    <h2 class="heading-section">Login Admin</h2>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Login</h3>
                        <form method="POST" action="/login-admin" class="login-form">

                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="Mobile"
                                    name="mobile" required>
                                <span class="text-danger">
                                    @error('mobile')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" placeholder="Password"
                                    name="password" required>
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>

                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->

</body>

</html>
