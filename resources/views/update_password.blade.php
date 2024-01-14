<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Password</title>
</head>
<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif
    @if (Session::has('message'))
        <p>{{Session::get('message')}}</p>
    @endif

    <form action="{{route('store_password')}}" method="post">
        @method('patch')
        @csrf
        <input type="password" name="new_password">
        <input type="password" name="new_password_confirmation">
        <button type="submit">Change Password</button>
    </form>
</body>
</html>