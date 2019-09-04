<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
    <h1>Список машин</h1>
    @if($cars)
        @foreach($cars as $car)
            <p>Машина - {{$car->name}}, производитель - {{$car->brand->name}}</p>
        @endforeach
    @endif
</body>
</html>
