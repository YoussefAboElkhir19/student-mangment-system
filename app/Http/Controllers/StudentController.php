<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::all();

        return view('students.index', ['students' => $students]);
    }
    public function create()
    {
        return view('students.create');
    }
    public function store()
    {
        // validation data input
        request()->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'address' => ['required', 'min:5'],
            'email' => ['required', 'email', 'unique:students,email,except,id'],
            'mobile' => ['required', 'size:11', 'unique:students,mobile,except,id'],

        ]);
        // Get data after Validation
        $name = request()->name;
        $address = request()->address;
        $email = request()->email;
        $mobile = request()->mobile;
        // create data in database
        Student::create([
            'name' => $name,
            'address' => $address,
            'email' => $email,
            'mobile' => $mobile
        ]);
        return redirect()->route('students.index')->with('success', 'Student Added Successfully');
    }
    public function show($studentId)
    {
        $student = Student::find($studentId);
        if (is_null($student))
            return redirect()->route('students.index');
        return view('students.show', ['student' => $student]);
    }
    public function edit($studentId)
    {
        $student = Student::findorFail($studentId);
        return view('students.edit', ['student' => $student]);
    }
    public function update($studentId)
    {
        // validation data
        request()->validate([
            'name' => ['min:3', 'max:20'],
            'address' => ['min:5'],
            'email' => ['email'],
            'mobile' => ['size:11'],
        ]);
        // get data after validation
        $name = request()->name;
        $address = request()->address;
        $email = request()->email;
        $mobile = request()->mobile;
        // select one student
        $student = Student::findorFail($studentId);
        // Update in DB
        $student->update([
            'name' => $name,
            'address' => $address,
            'email' => $email,
            'mobile' => $mobile

        ]);
        // redirection
        return redirect()->route('students.index');
    }
    public function destory($studentId)
    {
        // select one student
        $student = Student::find($studentId);
        // delete student
        $student->delete();
        // redirection
        return redirect()->route('students.index')->with('delete', 'Student Deleted Successfully');
    }
}
