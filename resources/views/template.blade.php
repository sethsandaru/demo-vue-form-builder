<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Demo Vue Form Builder - Seth Phat</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="{{url('/')}}">Vue-Form-Builder</a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/register')}}">Register</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/create-document')}}">Create Document</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/contact-us')}}">Contact Us</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/form-config')}}">
                    Form Configuration
                </a>
            </li>
        </ul>
    </nav>

    <div id="app" class="mt-4">
        @yield('content')
    </div>
    <script>
        var API_PATH = "{{url('/api')}}";
    </script>
    <script src="{{asset('js/app.js')}}" defer></script>
</body>
</html>
