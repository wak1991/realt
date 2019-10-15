<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/my.css" rel="stylesheet">
    <title>Тестовое задание</title>
</head>
<body>
<section class="main-slogan">
    <div class="container">
        <div class="row">
            <div class="form-group col-sm-4">
                <a href="{{route('index')}}" class="btn btn-success">Гистограмма</a>
            </div>
            <div class="form-group col-sm-4">
                <a href="{{route('get')}}" class="btn btn-primary">Получить данные</a>
            </div>
        </div>
    </div>
</section>
@yield('content')

<script src="/js/jquery-2.2.3.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="{!! asset('js/app.js') !!}"></script>
</body>
</html>