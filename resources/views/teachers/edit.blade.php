@extends('layouts.app')


@section('title' , 'editTeacher')
@section('content')
<form method="POST" action="{{ route('teachers.update' ,  $teacher->id ) }}" >
    @csrf
    @method('PUT')


<div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input  type="text" class="form-control" id="title" name="name" value="{{ $teacher->name }}">
    <p class="text-danger">
        @error('name')
            {{ $message }}
        @enderror
    </p>

</div>
<div class="mb-3">

    <label for="" class="form-label">Address</label>
    <input  type="text" class="form-control" id="title" name="address" value="{{ $teacher->address}}" >
    <p class="text-danger">

    @error('address')
    {{ $message }}

    @enderror
    </p>

</div>

<div class="mb-3">

    <label for="" class="form-label">Mobile</label>
    <input  type="text" class="form-control" id="title" name="mobile" value="{{ $teacher->mobile }}" >
    <p class="text-danger">

        @error('mobile')
        {{ $message }}

        @enderror
        </p>

</div>

<button class="btn btn-primary">Update</button>
</form>


    @endsection
