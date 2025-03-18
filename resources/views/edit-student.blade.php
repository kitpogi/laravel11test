<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="card mt-4">
            <div class="card-header">Edit Student</div>

            @if (Session::has('fail'))
                <div class="alert alert-danger p-2">{{ Session::get('fail') }}</div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success p-2">{{ Session::get('success') }}</div>
            @endif

            <div class="card-body">
                <form action="{{ route('students.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $student->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Student Name</label>
                        <input type="text" name="name" value="{{ $student->name }}" class="form-control" id="name" placeholder="Enter student name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" name="age" value="{{ $student->age }}" class="form-control" id="age" placeholder="Enter age">
                        @error('age')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" class="form-control" id="gender">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" value="{{ $student->address }}" class="form-control" id="address" placeholder="Enter address">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
