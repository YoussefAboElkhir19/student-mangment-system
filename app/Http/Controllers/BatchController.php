<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    //
    public function index()
    {
        $batches = Batch::all();


        return view('batches.index', compact('batches'));
    }
    public function create()
    {
        $courseinfo = Course::all();
        return view('batches.create', compact('courseinfo'));
    }
    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:3', 'unique:batches,name'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'course_id' => ['required', 'exists:courses,id']
        ]);
        $name = request()->name;
        $start_date = request()->start_date;
        $end_date = request()->end_date;
        $course_id = request()->course_id;
        Batch::create([
            'name' => $name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'course_id' => $course_id
        ]);
        return redirect()->route('batches.index')->with('success', 'Batch Created Successfully');
    }
    public function show($batchid)
    {
        $batch = Batch::findorfail($batchid);

        return view('batches.show', compact('batch'));
    }
    // Edit
    public function edit($batchId)
    {
        $batch = Batch::findorFail($batchId);
        $courseinfo = Course::all();
        return view('batches.edit', compact('batch', 'courseinfo'));
    }
    public function update($batchId)
    {
        request()->validate([
            'name' => ['min:3', 'unique:batches,name'],
            'start_date' => ['date'],
            'end_date' => ['date'],
            'course_id' => ['exists:courses,id']
        ]);
        $name = request()->name;
        $start_date = request()->start_date;
        $end_date = request()->end_date;
        $course_id = request()->course_id;

        $batch = Batch::findorFail($batchId);
        $batch->update([
            'name' => $name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'course_id' => $course_id
        ]);
        return redirect()->route('batches.index')->with('success', 'Batch Updated Successfully');
    }
    public function destroy($batchId)
    {
        $batch = Batch::findorFail($batchId);
        $batch->delete();
        return redirect()->route('batches.index')->with('delete', 'Batch Deleted Successfully');
    }
}
