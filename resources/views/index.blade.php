<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>{{__('Welcome To This Page')}}</h1>
    <p>Locale : {{App::getLocale()}}</p>
    <a href="{{route('set_locale', 'en')}}">English</a>
    <br>
    <a href="{{route('set_locale', 'id')}}">Indonesia</a>
    <br>

    @if (Auth::check())
        <p>ID : {{$id}}</p>
        <p>{{__('Name')}} : {{$user->name}}</p>
        <p>{{__('Email')}} : {{$user->email}}</p>
        <p>{{__('Role')}} : {{$user->role}}</p>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit">{{__('Logout')}}</button>
        </form>
    @else
        <a href="{{route('login')}}">{{__('Login')}}</a>
        <a href="{{route('register')}}">{{__('Register')}}</a>
    @endif

    <table border="1">
        <tr>
            <th>Id</th>
            <th>{{__('Nama')}}</th>
            <th>{{__('Score')}}</th>
            <th>{{__('Action')}}</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>
                    <a href="{{route('show', $student->id) }}">
                    {{$student->name}}
                    </a>
                </td>
                <td>{{$student->score}}</td>
                <td>
                    <form action="{{route('edit', $student)}}" method="get">
                        @csrf
                        <button type="submit">{{__('Edit')}}</button>
                    </form>
                    <form action="{{route('delete', $student)}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit">{{__('Delete')}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <p>{{__('Current Page')}} : {{$students->currentPage()}}</p>
    <p>Total Data : {{$students->total()}}</p>
    <p>{{__('Data Per Page')}} : {{$students->perPage()}}</p>

    {{$students->links('pagination::bootstrap-4')}}

</body>
</html>