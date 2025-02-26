@extends('layouts.app')


@section('title' , 'editBatch')
@section('content')
<form method="POST" action="{{ route('batches.update' , $batch->id) }}" >
    @csrf
    @method('PUT')

    <div class="my-4 text-center">

        <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-pen-to-square"></i> Edit Batch</h2>

    </div>
<div class="mb-3">
    <label for="" class="form-label">Name Batch</label>
    <input  type="text" class="form-control" id="title" name="name" value="{{ $batch->name }}">
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
        <option value="{{ $course->id }} " @if ($course->id == $batch->course_id) selected @endif>{{ $course->name }}</option>
        @endforeach
    </select>



    @error('course_id')
    {{ $message }}

    @enderror
    </p>

</div>
<div class="mb-3">

    <label for="" class="form-label">Start Date</label>
    <input  type="text" class="form-control" id="title" name="start_date" value="{{ $batch->start_date }}" >
    <p class="text-danger">

        @error('start_date')
        {{ $message }}

        @enderror
        </p>


</div>
<div class="mb-3">

    <label for="" class="form-label">End Date</label>
    <input  type="text" class="form-control" id="title" name="end_date" value="{{ $batch->end_date }}" >
    <p class="text-danger">

        @error('end_date')
        {{ $message }}

        @enderror
        </p>


</div>


<button class="btn btn-primary">Update</button>
</form>


    @endsection
