<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="{{ URL::asset('js/jquery.min.js') }} " rel="stylesheet"> 
    <link href="{{ URL::asset('css/style.css') }} " rel="stylesheet"> 
    
    <script src='https://jqueryvalidation.org/files/lib/jquery-1.11.1.js' > </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
</head>
<body>
@include('layouts.header')
@yield('body')
@include('layouts.footer')
</html>