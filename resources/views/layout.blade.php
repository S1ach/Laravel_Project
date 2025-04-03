<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Site</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">News-site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('article.index') }}">Статьи</a>
          </li>
          @can('article')
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/article/create">Создать статью</a>
          </li>
          @endcan
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/about">О нас</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="contact" href="/contact">Контакты</a>
          </li>
      </ul>
        @guest
        <a class="btn alert-secondary mr-3" href="/auth/create">Регистрация</a>
        <a class="btn alert-secondary" href="/auth/login">Вход</a>
        @endguest
        @auth
        <a class="btn alert-secondary" href="/auth/logout">Выход</a>
        @endauth    
      </div>
  </div>
</nav>
    </header>
    <div id="app">

  </div>
    <main>
        <div class="container mt-3">
            @yield('content')
        </div>
    </main>
<footer class="page-footer font-small blue pt-4 ">
  <div class="footer-copyright text-center py-3" style="background:rgb(235, 235, 235); position: fixed; bottom: 0; left: 0; right: 0; height: 50px;">
      © 2025 Гильманов Тимур Рустемович:
      <b> 231-131</b>
  </div>
</footer>
</body>
</html>