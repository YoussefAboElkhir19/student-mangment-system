@extends('layouts.app')


@section('title' , 'createEnrollment')
@section('content')
<form method="POST" action="{{ route('enrollments.store') }}" >
    @csrf
    <div class="my-4 text-center">

        <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-pen"></i> Create New Enrollment</h2>

    </div>

<div class="mb-3">
    <label for="" class="form-label">Enrollment No</label>
    <input  type="text" class="form-control" id="title" name="enrollment_no" value="{{ old('enrollment_no') }}">
    <p class="text-danger">
        @error('enrollment_no')
            {{ $message }}
        @enderror
    </p>

</div>
<div class="mb-3">

    <label for="" class="form-label">Student Name</label>
    <select name="student_id" id="" class="form-control">
        @foreach ( $students as $student )
        <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
    </select>

    <p class="text-danger">

        @error('student_id')
        {{ $message }}

        @enderror
    </p>
    <label for="" class="form-label">Batch Name</label>
    <select name="batch_id" id="" class="form-control">
        @foreach ( $batches as $batch )
        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
        @endforeach
    </select>

    <p class="text-danger">

        @error('batch_id')
        {{ $message }}

        @enderror
    </p>
    <div class="mb-3">
        <label for="" class="form-label">Join Date</label>
        <input  type="text" class="form-control" id="title" name="join_date" value="{{ old('join_date') }}">
        <p class="text-danger">
            @error('join_date')
                {{ $message }}
            @enderror
        </p>

    </div>

</div>


<button class="btn btn-success">Save</button>
</form>


    @endsection
