

@extends('layouts.app')

@section('title' , 'showPayment')

@section('content')
<style>
    .card {
        max-width: 600px;
        margin: 20px auto;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        border: none;
    }

    .card-header {
        background-color: #007bff;
        color: white;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        background-color: #f8f9fa;
        padding: 20px;
    }

    .card-title {
        font-size: 22px;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }

    .card-text {
        font-size: 18px;
        color: #555;
    }

    .card-text strong {
        color: #000;
    }
</style>


<div class="card">
    <div class="card-header">
      <h2>  Payment Details</h2>

    </div>
    <div class="card-body">
        <h5 class="card-title">Enrollment No : {{ $payment->enrollment->enrollment_no }}</h5>
        <p class="card-text"><strong>Paid Date :</strong> {{ $payment->paid_date }}  </p>
        <p class="card-text"><strong>Price:</strong> {{ $payment->price}} </p>
        {{-- <p class="card-text"><strong>Student Name :</strong> {{ $payment->student->name }} </p>
        <p class="card-text"><strong>Batch Name :</strong> {{ $payment->batch->name }} </p> --}}
        <p class="card-text"><strong>Created At:</strong> {{ $payment->created_at }} </p>


    </div>
</div>



</tbody>
</table>

@endsection
