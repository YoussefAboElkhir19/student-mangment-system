@extends('layouts.app')


@section('title' , 'createBatche')
@section('content')
<form method="POST" action="{{ route('batches.store') }}" >
    @csrf
    <div class="my-4 text-center">

        <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-pen"></i> Create New Batch</h2>

    </div>
<div class="mb-3">
    <label for="" class="form-label">Name Batch</label>
    <input  type="text" class="form-control" id="title" name="name" value="{{ old('name') }}">
    <p class="text-danger">
        @error('name')
            {{ $message }}
        @enderror
    </p>

</div>
<div class="mb-3">
    <label for="" class="form-label">Course Name</label>
    <select name="course_id" class="form-control" >
        @foreach ($courseinfo as $course )
        <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select>

    @error('course_id')
    {{ $message }}

    @enderror
    </p>

</div>
<div class="mb-3">

    <label for="" class="form-label">Start Date</label>
    <input  type="text" class="form-control" id="title" name="start_date" value="{{ old('startDate') }}" >
    <p class="text-danger">

        @error('start_date')
        {{ $message }}

        @enderror
        </p>


</div>
<div class="mb-3">

    <label for="" class="form-label">End Date</label>
    <input  type="text" class="form-control" id="title" name="end_date" value="{{ old('end_date') }}" >
    <p class="text-danger">

        @error('end_date')
        {{ $message }}

        @enderror
        </p>


</div>


<button class="btn btn-success">Save</button>
</form>


    @endsection
