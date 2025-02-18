<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        {{-- here we will pass the list of all users --}}
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Laravel 11 CRUD System
                    <a href="/add/user" class="btn btn-success btn-sm float-end">Add User</a>
                </div>
                @if (Session::has('success'))
                <span class="alert alert-success p=2">{{Session::get('success')}}</span>

            @endif
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <th>S/N</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Registration Date</th>
                            <th>Last Update</th>
                        </thead>

                        <tbody>
                            @if (count($all_users)> 0)
                            @foreach ( $all_users as $item )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->full_name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone_number}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                            </tr>

                            @endforeach

                            @endif
                        </tbody>

                    </table>
                </div>
        </div>
</body>
</html>
