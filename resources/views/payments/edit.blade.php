@extends('layouts.app')


@section('title' , 'editPayment')
@section('content')
<form method="POST" action="{{ route('payments.update' , $payment->id) }}" >
    @csrf

@method('PUT')
<div class="my-4 text-center">

    <h2 class=" fs-1 fw-bold"><i class="fa-solid fa-pen-to-square"></i> Edit Payment</h2>

</div>
<div class="mb-3">
    <label for="" class="form-label">Enrollment No</label>
    <select name="enrollment_id" id="" class="form-control">
        @foreach ( $enrolls as $enroll )
        <option value="{{ $enroll->id }}"
            @if ($payment->enrollment_id ==$enroll->id) ? selected
            @endif
            >{{ $enroll->enrollment_no }}</option>

        @endforeach
    </select>
    <p class="text-danger">
        @error('enrollment_id')
            {{ $message }}
        @enderror
    </p>

</div>



    <div class="mb-3">
        <label for="" class="form-label">Paid Date</label>
        <input  type="text" class="form-control" id="title" name="paid_date" value="{{ $payment->paid_date }}">
        <p class="text-danger">
            @error('paid_date')
                {{ $message }}
            @enderror
        </p>

    </div>
    <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input  type="text" class="form-control" id="title" name="price" value="{{ $payment->price }}">
        <p class="text-danger">
            @error('price')
                {{ $message }}
            @enderror
        </p>

    </div>



<button class="btn btn-primary">Update</button>
</form>


    @endsection
