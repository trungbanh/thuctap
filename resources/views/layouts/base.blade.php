<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <script src="{{ URL::asset('js/jquery.min.js') }} " > </script> 
    <link href="{{ URL::asset('css/style.css') }} " rel="stylesheet"> 
    
    <script src='https://jqueryvalidation.org/files/lib/jquery-1.11.1.js' > </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
</head>
<body>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('before_body_start')
    
    @include('layouts.header')
    @yield('body')
    @include('layouts.footer')

    @yield('before_body_end')
</body>
</html>