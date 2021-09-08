<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ucfirst($outfit->color)}} {{$outfit->type}}</title>
    <style>
        @font-face {
            font-family: 'Roboto Slab';
            src: url({{asset('fonts/RobotoSlab-Regular.ttf')}});
            font-weight: normal;
        }
        @font-face {
            font-family: 'Roboto Slab';
            src: url({{asset('fonts/RobotoSlab-Bold.ttf')}});
            font-weight: bold;
        }
        body {
            font-family: 'Roboto Slab';
        }
        div {
            margin: 7px;
            padding: 7px;
        }
        .master {
            font-size: 18px;
        }
        .about {
            font-size: 11px;
            color: gray;
        }
        .color {
            margin: 12px;
            font-size: 25px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <h1>{{$outfit->type}}</h1>
    <div class="master">Master: {{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}</div>
    <div class="size">Size: {{$outfit->size}}</div>
    <div class="color">{{$outfit->color}}</div>
    <div class="about">{!!$outfit->about!!}</div>
</body>
</html>