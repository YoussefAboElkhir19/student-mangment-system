@extends('layouts.app')
@section('title', 'indexBatch')
@section('content')
<div class="my-4">

    <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-people-group"></i> Batches</h2>

</div>

<div class="my-5 text-center ">

    <a href="{{ route('batches.create') }}" class="btn btn-success fw-semibold" ><i class="fa-solid fa-plus"></i> ADD New Batch </a>


</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name Batch</th>
            <th scope="col">Course</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
             <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 1;
        @endphp

        @foreach ($batches as $batch )
        {{-- posts collection of objects and post is object  --}}

        <tr>
            <th scope="row">{{ $counter++}}</th>
            <td>{{ $batch->name }}</td>
            <td>{{ $batch->course->name }}</td>
            <td>{{ $batch->start_date }}</td>
            <td> {{ $batch->end_date }}</td>
            <td>

                <a href="{{ route('batches.show', $batch->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i> View</a>
                <a href="{{ route('batches.edit' , $batch->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>


                <form style="display:inline" method="POST" action="{{ route('batches.destroy' , $batch->id) }}" onsubmit="return confirmDelete()">
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
