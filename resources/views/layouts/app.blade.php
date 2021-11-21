<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>
  
    <meta name="description" content="Банк тестов ТУИТ." /> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <title>GetCredit.uz</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css" integrity="sha512-ajhUYg8JAATDFejqbeN7KbF2zyPbbqz04dgOLyGcYEk/MJD3V+HJhJLKvJ2VVlqrr4PwHeGTTWxbI+8teA7snw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">

</head>

<body class="d-flex flex-column h-100">

    <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">GetCredit.uz</a>
        <a href="{{route('contribute')}}" class="btn btn-primary">+ Добавить тесты</a>
      </div>
    </nav>

    <main class="flex-shrink-0">        
        @yield('content')               
    </main>
      

    <footer class="footer mt-auto pt-3 bg-dark">
    
      <div class="container text-muted">
        <div class="row text-center">
          <div class="col-lg">
            <p>© Copyright 2021  GetCredit.uz</span>
          </div>

          <div class="col-lg">
            <p>
              Сообщить об ошибке: 
              <a href="https://t.me/bakhtiyor2000" class="link" target="_blank">
                <i class="fab fa-telegram fs-4 ms-2"></i>
              </a>

              <a href="https://github.com/bakhtiyor-dev/getcredit/issues" class="link"  target="_blank">
                <i class="fab fa-github fs-4 ms-2"></i>
              </a>
            
            </p>
          
          </div>
        </div>
      </div>

    </footer>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
    @yield('scripts')
</body>
</html>