@extends('layouts.app')


@section('title' , 'createCourse')
@section('content')
<form method="POST" action="{{ route('courses.store') }}" >
    @csrf
    <div class="my-4 text-center">

        <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-pen"></i> Create New Course</h2>

    </div>

<div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input  type="text" class="form-control" id="title" name="name" value="{{ old('name') }}">
    <p class="text-danger">
        @error('name')
            {{ $message }}
        @enderror
    </p>

</div>
<div class="mb-3">

    <label for="" class="form-label">Duration (Months)</label>
    <input  type="text" class="form-control" id="title" name="duration" value="{{ old('duration') }}" >
    <p class="text-danger">

    @error('duration')
    {{ $message }}

    @enderror
    </p>

</div>
<div class="mb-3">

    <label for="" class="form-label">Content</label>
    <input  type="text" class="form-control" id="title" name="content" value="{{ old('content') }}" >
    <p class="text-danger">

        @error('content')
        {{ $message }}

        @enderror
        </p>


</div>


<button class="btn btn-success">Save</button>
</form>


    @endsection
