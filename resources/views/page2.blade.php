<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
    <h1>Страница 2</h1>
    <h3>Параметры страницы:</h3>
    @foreach($_GET as $key => $value)
        <p>{{$key}} - {{$value}}</p>
    @endforeach

    @foreach($_POST as $key => $value)
        <p>{{$key}} - {{$value}}</p>
    @endforeach
</body>
</html>
