<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Score</th>
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
            </tr>
        @endforeach
    </table>

    <p>Current Page : {{$students->currentPage()}}</p>
    <p>Total Data : {{$students->total()}}</p>
    <p>Data Per Page : {{$students->perPage()}}</p>

    {{$students->links('pagination::bootstrap-4')}}

</body>
</html>