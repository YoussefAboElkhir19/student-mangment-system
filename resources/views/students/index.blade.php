@extends('layouts.app')

@section('title', 'indexStudents')

@section('content')
<div class="my-4">

     <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-person"></i> Students</h2>

</div>
<div class="my-4 text-center ">

    <a href="{{ route('students.create') }}" class="btn btn-success fw-semibold" ><i class="fa-solid fa-plus"></i> ADD New Student </a>


</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
             <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter=1;
        @endphp

        @foreach ($students as $student )
        {{-- posts collection of objects and post is object  --}}

        <tr>
            <th scope="row">{{ $counter++ }}</th>
            <td>{{ $student->name }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->mobile }}</td>
            <td>

                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i>  View</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                <form style="display:inline" method="POST" action="{{ route('students.destory' , $student->id) }}" onsubmit="return confirmDelete()">
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
