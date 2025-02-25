@extends('layouts.app')

@section('title' , 'showTeacher')

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
      <h2>  Teacher Details</h2>

    </div>
    <div class="card-body">
        <h5 class="card-title">Name : {{ $teacher->name }}</h5>
        <p class="card-text"><strong>Address :</strong> {{ $teacher->address }} </p>
        <p class="card-text"><strong>Created At :</strong> {{ $teacher->created_at }} </p>


    </div>
</div>



</tbody>
</table>

@endsection
