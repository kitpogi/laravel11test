<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Load all students
    public function loadAllStudents()
    {
        $all_students = Student::all();
        return view('admin.students', compact('all_students'));
    }

    // Load form to add a new student
    public function loadAddStudentForm()
    {
        return view('add-student');
    }

    // Add a new student
    public function AddStudent(Request $request)
    {
        // Form validation
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric|min:1',
            'gender' => 'required|string|max:6',
            'address' => 'required|string|max:255',
        ]);

        try {
            // Create new student
            $new_student = new Student();
            $new_student->name = $request->name;
            $new_student->age = $request->age;
            $new_student->gender = $request->gender;
            $new_student->address = $request->address;
            $new_student->save();

            return redirect()->route('dashboard')->with('success', 'Student Added Successfully');
        } catch (\Exception $e) {
            return redirect()->route('students.add')->with('fail', $e->getMessage());
        }
    }

    // Edit student details
    public function EditStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric|min:1',
            'gender' => 'required|string|max:6',
            'address' => 'required|string|max:255',
        ]);

        try {
            // Find the student first
            $student = Student::find($request->student_id);
            if (!$student) {
                return redirect()->route('dashboard')->with('fail', 'Student not found');
            }

            // Update student fields
            $student->name = $request->name;
            $student->age = $request->age;
            $student->gender = $request->gender;
            $student->address = $request->address;
            $student->save();

            return redirect()->route('dashboard')->with('success', 'Student Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('students.edit', ['id' => $request->student_id])->with('fail', $e->getMessage());
        }
    }

    // Load edit student form
    public function loadEditForm($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('dashboard')->with('fail', 'Student not found');
        }
        return view('edit-student', compact('student'));
    }

    // Delete student
    public function deleteStudent($id)
    {
        try {
            $student = Student::find($id);
            if (!$student) {
                return redirect()->route('dashboard')->with('fail', 'Student not found');
            }

            $student->delete();
            return redirect()->route('dashboard')->with('success', 'Student Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('fail', $e->getMessage());
        }
    }

    // Load dashboard with students
    public function loadDashboard()
    {
        $students = Student::all();
        return view('dashboard', compact('students'));
    }
}
