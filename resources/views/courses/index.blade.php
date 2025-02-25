@extends('layouts.app')
@section('title', 'indexCourses')
@section('content')
<div class="my-4">

    <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-book-open-reader"></i> Courses</h2>

</div>

<div class="my-5 text-center ">

    <a href="{{ route('courses.create') }}" class="btn btn-success fw-semibold" ><i class="fa-solid fa-plus"></i> ADD New Course </a>


</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Duration</th>
            <th scope="col">Created At</th>
             <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
        $counter=1;
    @endphp

        @foreach ($courses as $course )
        {{-- posts collection of objects and post is object  --}}

        <tr>
            <th scope="row">{{ $counter++ }}</th>
            <td>{{ $course->name }}</td>
            <td>{{ $course->duration }} Month</td>
            <td>{{ $course->created_at }}</td>
            <td>

                <a href="{{ route('courses.show' , $course->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i> View</a>
                <a href="{{ route('courses.edit' , $course->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                <form style="display:inline" method="POST" action="{{ route('courses.destroy' , $course->id) }}" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
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
