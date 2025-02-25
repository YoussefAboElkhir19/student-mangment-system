<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function index()
    {
        $enrollments = Enrollment::all();
        return view('enrollments.index', compact('enrollments'));
    }
    public function show($enrollId)
    {
        $enroll = Enrollment::findorFail($enrollId);
        // $student = Student::pluck('name', 'id');
        // $batch = Batch::pluck('name', 'id');
        return view('enrollments.show', compact('enroll'));
    }
    public function create()
    {
        $students = Student::all();
        $batches = Batch::all();
        return view('enrollments.create', compact('students', 'batches'));
    }
    public function store()
    {
        request()->validate([
            'enrollment_no' => ['required', 'unique:enrollments,id', 'numeric', 'unique:enrollments,enrollment_no'],
            'student_id' => ['required', 'exists:students,id'],
            'batch_id' => ['required', 'exists:batches,id'],
            'join_date' => ['required', 'date'],

        ]);
        $enrollment_no = request()->enrollment_no;
        $student_id = request()->student_id;
        $batch_id = request()->batch_id;
        $join_date = request()->join_date;
        Enrollment::create([
            'enrollment_no' => $enrollment_no,
            'student_id' => $student_id,
            'batch_id' => $batch_id,
            'join_date' => $join_date,
        ]);
        return redirect()->route('enrollments.index')->with('success', 'Created Enrollment Successfully');
    }
    public function edit($enrollId)
    {
        $enroll = Enrollment::findorFail($enrollId);
        $students = Student::all();
        $batches = Batch::all();
        return view('enrollments.edit', compact('enroll', 'students', 'batches'));
    }
    public function update($enrollId)
    {
        request()->validate([
            'enrollment_no' => ['unique:enrollments,id', 'numeric', 'unique:enrollments,enrollment_no'],
            'student_id' => ['exists:students,id'],
            'batch_id' => ['exists:batches,id'],
            'join_date' => ['date'],
        ]);
        $enrollment_no = request()->enrollment_no;
        $student_id = request()->student_id;
        $batch_id = request()->batch_id;
        $join_date = request()->join_date;
        $enroll = Enrollment::findorFail($enrollId);
        $enroll->update([
            'enrollment_no' => $enrollment_no,
            'student_id' => $student_id,
            'batch_id' => $batch_id,
            'join_date' => $join_date
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Updated  Enrollment Successfuly');
    }
    public function destroy($enrollId)
    {
        $enroll = Enrollment::findorFail($enrollId);
        $enroll->delete();
        return redirect()->route('enrollments.index')->with('delete', 'Deleted Enrollment Successfuly');
    }
}
