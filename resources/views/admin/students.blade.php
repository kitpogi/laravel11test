<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 Student CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                Laravel 11 Student Management
                <a href="/add/student" class="btn btn-success btn-sm float-end">Add Student</a>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-success p-2">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger p-2">{{ Session::get('fail') }}</div>
            @endif

            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Student Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Registration Date</th>
                            <th>Last Update</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($all_students) > 0)
                            @foreach ($all_students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->created_at->format('Y-m-d H:i') }}</td>
                                    <td>{{ $student->updated_at->format('Y-m-d H:i') }}</td>
                                    <td><a href="/edit/student/{{ $student->id }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td>
                                        <a href="/delete/student/{{ $student->id }}"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">No Students Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
