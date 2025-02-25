@extends('layouts.app')


@section('title' , 'index')
@section('content')


<div class="my-5 text-center ">

        <a href="{{route('posts.create')}}" class="btn btn-success" > Create Post </a>


    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post )
            {{-- posts collection of objects and post is object  --}}

            <tr>
                <th scope="row">{{ $post->id}}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                <td>

                    <a href="{{route('posts.show' , $post->id )}}" class="btn btn-info">View</a>
                    <a href="{{ route('posts.edit' , $post->id) }}" class="btn btn-primary">Edit</a>


                    <form style="display:inline" method="POST" action="{{ route('posts.destory' , $post['id']) }}" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>


                </td>


            </tr>
            @endforeach

        </tbody>
    </table>

<script>
    function confirmDelete(){
        return confirm('Are you sure you want to delete this post?');
    }
</script>


    @endsection
