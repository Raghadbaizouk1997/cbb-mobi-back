<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <title>Dubai</title>
    <link href="{{ asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/simple-line-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/dest/style.css')}}" rel="stylesheet">
</head>
<body class="navbar-fixed sidebar-nav fixed-nav">
    <header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#"></a>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>

            </ul>
            <ul class="nav navbar-nav pull-left hidden-md-down">
                <li class="nav-item">

                    <div class="" style="padding-left:10px;">
                        <a class="" href="logout" style="font-size: 15px;text-decoration: none; color:#263238"><i class="fa fa-lock"></i> خروج</a>
                       
                    </div>
                </li>
              
                <li class="nav-item">
                    
                </li>

            </ul>
            
        </div>
    </header>
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item" style="background: #2c4a54;">
                    <a class="nav-link" href="{{ URL::to('/dashboard') }}"><i class="icon-speedometer"></i> لوحة التحكم</a>
                </li>

                <li class="nav-title">
                </li>
              
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/users"><i class="fa fa-solid fa-users"></i> المستخدمون</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
        @yield('sub_title')
        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                @yield('content')
            </div>

        </div>
    </main>

    <footer class="footer" style="direction: ltr">
        <span class="text-left">
            <a href="">CBB MOBI</a> &copy; 2023    .
        </span>
        <span class="">
            Powered by <a href="">CBB MObI</a>
        </span>
    </footer>
    <script>
        formFile.onchange = evt => {

            blah.innerHTML = "";
            for (let i = 0; i < formFile.files.length; i++) {
                blah.innerHTML += '<img src="' + URL.createObjectURL(formFile.files[i]) +
                    '" width="100%" />'
            }
           
        }
    </script>
  

{{-- <script>
    formFile.onchange = evt => {

        blah.innerHTML = "";
        for (let i = 0; i < formFile.files.length; i++) {
            blah.innerHTML += '<img src="' + URL.createObjectURL(formFile.files[i]) +
                '" width="100%" />'

        }
    }
</script> --}}
    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('admin/js/libs/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/js/libs/tether.min.js')}}"></script>
    <script src="{{ asset('admin/js/libs/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/libs/pace.min.js')}}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('admin/js/libs/Chart.min.js')}}"></script>

    <!-- CoreUI main scripts -->

    <script src="{{ asset('admin/js/app.js')}}"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    <script src="{{ asset('admin/js/views/main.js')}}"></script>

    <!-- Grunt watch plugin -->
    <script src="//localhost:35729/livereload.js')}}"></script>
</body>

</html>
