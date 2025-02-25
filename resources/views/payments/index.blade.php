@extends('layouts.app')

@section('title' , 'paymentindex')

@section('content')
<div class="my-4">

    <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-money-check-dollar"></i> Payments</h2>

</div>
<div class="my-5 text-center ">

    <a href="{{ route('payments.create') }}" class="btn btn-success fw-semibold" > <i class="fa-solid fa-plus"></i> ADD New Payments </a>


</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Enroll no</th>
            <th scope="col">Paid Date</th>
            <th scope="col">Price</th>
             <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $counter=1;
        @endphp

        @foreach ($payments as $payment )
        {{-- posts collection of objects and post is object  --}}

        <tr>
            <th scope="row">{{ $counter++ }}</th>
            <td>{{ $payment->enrollment->enrollment_no }}</td>
            <td>{{ $payment->paid_date }}</td>
            <td>{{ $payment->price }}</td>


            <td>

                <a href="{{ route('payments.show' , $payment->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i> View</a>
                <a href="{{ route('payments.edit' , $payment->id) }}" class="btn btn-primary"> <i class="fa-solid fa-pen-to-square"></i> Edit</a>


                <form style="display:inline" method="POST" action="{{ route('payments.destroy' , $payment->id) }}" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> Delete</button>
                </form>

                <a href="{{ route('report.report1' , $payment->id) }}" class="btn btn-success"> <i class="fa-solid fa-print"></i> Print</a>

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
