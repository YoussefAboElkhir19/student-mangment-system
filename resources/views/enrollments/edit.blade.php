@extends('layouts.app')


@section('title' , 'editEnrollment')
@section('content')
<form method="POST" action="{{ route('enrollments.update' , $enroll->id) }}" >
    @csrf

@method('PUT')
<div class="mb-3">
    <label for="" class="form-label">Enrollment No</label>
    <input  type="text" class="form-control" id="title" name="enrollment_no" value="{{ $enroll->enrollment_no}}">
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
        <option @if($enroll->student_id == $student->id) ? selected @endif value="{{ $student->id }}">{{ $student->name }}</option>
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
        <option value="{{ $batch->id }}" @if ($enroll->batch_id == $batch->id) selected

        @endif>{{ $batch->name }}</option>
        @endforeach
    </select>

    <p class="text-danger">

        @error('batch_id')
        {{ $message }}

        @enderror
    </p>
    <div class="mb-3">
        <label for="" class="form-label">Join Date</label>
        <input  type="text" class="form-control" id="title" name="join_date" value="{{ $enroll->join_date}}">
        <p class="text-danger">
            @error('join_date')
                {{ $message }}
            @enderror
        </p>

    </div>

</div>


<button class="btn btn-primary">Update</button>
</form>


    @endsection
