<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold text-xl text-dark">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <p class="text-dark fs-5">{{ __("You're logged in!") }}</p>

                <!-- Display Student List for Admin -->
                @if(auth()->user()->userType === 'admin')
                    <div class="mt-4">
                        <h3 class="fw-semibold text-dark">Student Management</h3>
                        <a href="{{ route('students.index') }}" class="btn btn-success mt-3">
                            Manage Students
                        </a>
                        
                        <!-- Student List -->
                        <div class="mt-4">
                            <h4 class="text-center fw-bold text-dark">All Students</h4>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr class="table-hover">
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->age }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ $student->address }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
