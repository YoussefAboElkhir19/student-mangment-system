<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }
    public function show($courseId)
    {
        $course = Course::findorFail($courseId);
        return view('courses.show', compact('course'));
    }
    public function create()
    {
        return view('courses.create');
    }
    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'duration' => ['required', 'numeric', 'max:12'],
            'content' => ['required', 'min:5']
        ]);
        $name = request()->name;
        $duration = request()->duration;
        $content = request()->content;
        Course::create([
            'name' => $name,
            'duration' => $duration,
            'content' => $content
        ]);
        return redirect()->route('courses.index')->with('success', 'Course Created Successfully');
    }
    public function edit($courseId)
    {
        $course = Course::findorFail($courseId);
        return view('courses.edit', compact('course'));
    }
    public function update($courseId)
    {
        request()->validate([
            'name' => 'min:3',
            'duration' => ['max:12', 'numeric'],
            'content' => 'min:5'
        ]);
        $name = request()->name;
        $duration = request()->duration;
        $content = request()->content;
        $course = Course::findorFail($courseId);
        $course->update([
            'name' => $name,
            'duration' => $duration,
            'content' => $content
        ]);
        return redirect()->route('courses.index')->with('success', 'Course Updated Successfully');
    }
    public function destroy($courseId)
    {
        $course = Course::findorFail($courseId);
        $course->delete();
        return redirect()->route('courses.index')->with('delete', 'Course Deleted Successfully');
    }
}
