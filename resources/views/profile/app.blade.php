<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset("css/custom.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    
    <link rel="stylesheet" href="{{ asset("css/sb-admin.css") }}">
    
    <script type="text/javascript" src="{{ asset("js/jquery.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset("js/bootstrap.min.js") }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    
</head>

<body>

    @include('profile.inc.header')
    @yield('content')
    @include('profile.inc.footer')

    @stack("app-scripts")
    <script type="text/javascript" src="{{ asset("js/app.js") }}"></script>
</body>

</html>
