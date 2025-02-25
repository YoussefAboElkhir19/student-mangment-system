@extends('layouts.app')


@section('title' , 'createStudent')
@section('content')
<form method="POST" action="{{ route('students.store') }}" >
    @csrf


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

    <label for="" class="form-label">Address</label>
    <input  type="text" class="form-control" id="title" name="address" value="{{ old('address') }}" >
    <p class="text-danger">

    @error('address')
    {{ $message }}

    @enderror
    </p>

</div>
<div class="mb-3">

    <label for="" class="form-label">Email</label>
    <input  type="text" class="form-control" id="title" name="email" value="{{ old('email') }}" >
    <p class="text-danger">

        @error('email')
        {{ $message }}

        @enderror
        </p>


</div>
<div class="mb-3">

    <label for="" class="form-label">Mobile</label>
    <input  type="text" class="form-control" id="title" name="mobile" value="{{ old('mobile') }}" >
    <p class="text-danger">

        @error('mobile')
        {{ $message }}

        @enderror
        </p>

</div>

<button class="btn btn-success">Save</button>
</form>


    @endsection
