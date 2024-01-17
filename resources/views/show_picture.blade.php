<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show picture</title>
</head>
<body>
    <p>{{$picture->name}}</p>
    <p>{{$picture->path}}</p>
    <img src="{{$url}}" alt="" width="200px">
</body>
</html>