@extends('layouts.app')


@section('title' , 'create')
@section('content')
<form method="POST" action="{{ route('posts.store') }}" >
    @csrf
    {{-- @if ($errors ->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif --}}

<div class="mb-3">
    <label for="" class="form-label">Title</label>
    <input  type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
    @error('title')
    <div class="text-danger">{{ $message }}</div>

    @enderror



</div>
<div class="mb-3">

    <label for="" class="form-label">Description</label>
    <textarea name="description" class="form-control"  rows="3" ></textarea>
    @error('description')

    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="" class="form-label">Posted By</label>
    <select name="posted_by" class="form-control">
        @foreach ($users as $user)

        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach


    </select>
    @error('posted_by')

    <div class="text-danger">{{ $message }}</div>
@enderror
</div>
<button class="btn btn-success">Submit</button>
</form>


    @endsection
