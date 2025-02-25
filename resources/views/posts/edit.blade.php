@extends('layouts.app')


@section('title' , 'edit')
@section('content')
<form method="POST" action="{{ route('posts.update' , $post->id) }}" >
    @csrf
    {{-- form tag not support PUT method --}}
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{  $post->title   }}">
        @error('title')
        <div class="text-danger">{{ $message }}</div>

        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3">{{ $post->description }}</textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="posted_by" class="form-label">Posted By</label>
            <select name="posted_by" class="form-control">
                @foreach ($users as $user)
                <option value="{{ $user->id }}" @if ($user->id == $post->user_id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('posted_by')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    @endsection
