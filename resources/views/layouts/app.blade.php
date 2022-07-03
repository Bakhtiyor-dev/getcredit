<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <title>GetCredit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css"
          integrity="sha512-ajhUYg8JAATDFejqbeN7KbF2zyPbbqz04dgOLyGcYEk/MJD3V+HJhJLKvJ2VVlqrr4PwHeGTTWxbI+8teA7snw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark">
    <div class="container d-flex">
        <div>
            <a href="/" class="btn text-light">Главная</a>
        </div>
        <div>
            <a href="{{route('contribute')}}" class="btn btn-primary">+ Добавить тестов</a>
        </div>
    </div>
</nav>

<main class="flex-shrink-0">
    @yield('content')
</main>


<footer class="footer mt-auto pt-3 bg-dark">

    <div class="container text-muted">
        <div class="row text-center">
            <div class="col-lg">
                <p>© Copyright 2022 GetCredit</span>
            </div>

        </div>
    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/js/script.js"></script>
@yield('scripts')
</body>
</html>