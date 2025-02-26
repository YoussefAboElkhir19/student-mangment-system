<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', ['teachers' => $teachers]);
    }
    public function create()
    {
        return view('teachers.create');
    }
    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'address' => ['required', 'min:5'],
            'mobile' => ['required', 'size:11', 'unique:students,mobile,except,id'],

        ]);
        // Get data after Validation
        $name = request()->name;
        $address = request()->address;
        $mobile = request()->mobile;
        // create data in database
        Teacher::create([
            'name' => $name,
            'address' => $address,
            'mobile' => $mobile
        ]);
        return redirect()->route('teachers.index')->with('success', 'Added Instractor  Successfully');
    }
    public function show($teacherId)
    {
        $teacher = Teacher::findorFail($teacherId);
        return view('teachers.show', ['teacher' => $teacher]);
    }
    public function edit($teacherId)
    {
        $teacher = Teacher::findorFail($teacherId);
        return view('teachers.edit', ['teacher' => $teacher]);
    }
    public function update($teacherId)
    {
        request()->validate([
            'name' => ['min:3', 'max:20'],
            'address' => ['min:5'],
            'mobile' => ['size:11'],

        ]);
        // Get data after Validation
        $name = request()->name;
        $address = request()->address;
        $mobile = request()->mobile;
        $teacher = Teacher::findorFail($teacherId);
        $teacher->update([
            'name' => $name,
            'address' => $address,
            'mobile' => $mobile
        ]);
        return redirect()->route('teachers.index')->with('success', 'Updated Instractor  Successfully');
    }
    public function destroy($teacherId)
    {
        $teacher = Teacher::findorFail($teacherId);
        $teacher->delete();
        return redirect()->route('teachers.index')->with('delete', 'Deleted Instractor  Successfully');
    }
}
