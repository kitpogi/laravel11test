<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Student List -->
            @if(auth()->user()->userType === 'admin')
                <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Student Management</h3>
                    <a href="{{ route('students.index') }}" class="mt-4 inline-block bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded shadow-md transition duration-300">
                        Manage Students
                    </a>

                    <div class="flex justify-center mt-6">
                        <div class="w-full max-w-4xl bg-white shadow-md rounded-lg p-6">
                            <h4 class="text-lg font-semibold text-gray-800 text-center mb-4">All Students</h4>
                            
                            <div class="overflow-x-auto">
                                <table class="w-full border-collapse border border-gray-300 text-center">
                                    <thead>
                                        <tr class="bg-blue-500 text-black">
                                            <th class="border px-4 py-2">ID</th>
                                            <th class="border px-4 py-2">Name</th>
                                            <th class="border px-4 py-2">Age</th>
                                            <th class="border px-4 py-2">Gender</th>
                                            <th class="border px-4 py-2">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                            <tr class="hover:bg-black hover:text-white">
                                                <td class="border px-4 py-2">{{ $student->id }}</td>
                                                <td class="border px-4 py-2">{{ $student->name }}</td>
                                                <td class="border px-4 py-2">{{ $student->age }}</td>
                                                <td class="border px-4 py-2">{{ $student->gender }}</td>
                                                <td class="border px-4 py-2">{{ $student->address }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
