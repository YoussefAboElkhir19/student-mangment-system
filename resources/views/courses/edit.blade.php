@extends('layouts.app')


@section('title' , 'editCourse')
@section('content')
<form method="POST" action="{{ route('courses.update' , $course->id) }}" >
    @csrf
    @method('PUT')

    <div class="my-4 text-center">

        <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-pen-to-square"></i> Edit Course</h2>

    </div>
<div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input  type="text" class="form-control" id="title" name="name" value="{{ $course->name }}">
    <p class="text-danger">
        @error('name')
            {{ $message }}
        @enderror
    </p>

</div>
<div class="mb-3">

    <label for="" class="form-label">Duration (Months)</label>
    <input  type="text" class="form-control" id="title" name="duration" value="{{ $course->duration }}" >
    <p class="text-danger">

    @error('duration')
    {{ $message }}

    @enderror
    </p>

</div>
<div class="mb-3">

    <label for="" class="form-label">Content</label>
    <input  type="text" class="form-control" id="title" name="content" value="{{ $course->content}}" >
    <p class="text-danger">

        @error('content')
        {{ $message }}

        @enderror
        </p>


</div>


<button class="btn btn-primary">Update</button>
</form>


    @endsection
