<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Maaz Blog</title>
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <link href="/https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/templatemo-xtra-blog.css" rel="stylesheet">
    <script src="http://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


</head>
<body>
@include('partials._sidebar')
<div class="container-fluid">
    <main class="tm-main">


        @include('partials._header')
        <br><br>

        @yield('content')
        <br><br>
        @include('partials._footer')


    </main>
</div>


<script src="/js/jquery.min.js"></script>
<script src="/js/templatemo-script.js"></script>
</body>
</html>
