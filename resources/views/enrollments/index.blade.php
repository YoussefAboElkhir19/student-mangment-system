@extends('layouts.app')

@section('title' , 'enrollmentsIndex')

@section('content')
<div class="my-4">

    <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-pen"></i> Enrollments</h2>

</div>
<div class="my-5 text-center ">

    <a href="{{ route('enrollments.create') }}" class="btn btn-success fw-semibold" ><i class="fa-solid fa-plus"></i> ADD New Enrollment </a>


</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Enroll no</th>
            <th scope="col">Student</th>
            <th scope="col">Batch</th>
            <th scope="col">Join Date</th>
             <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter=1;
        @endphp

        @foreach ($enrollments as $enroll )
        {{-- posts collection of objects and post is object  --}}

        <tr>
            <th scope="row">{{ $counter++ }}</th>
            <td>{{ $enroll->enrollment_no }}</td>
            <td>{{  $enroll->student->name}}</td>
            <td>{{ $enroll->batch->name }}</td>
            <td>{{ $enroll->join_date }}</td>


            <td>

                <a href="{{ route('enrollments.show' , $enroll->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i> View</a>
                <a href="{{ route('enrollments.edit' , $enroll->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                <form style="display:inline" method="POST" action="{{ route('enrollments.destroy' , $enroll->id) }}" onsubmit="return confirmDelete()">
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
