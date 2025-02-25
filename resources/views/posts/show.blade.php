

@extends('layouts.app')

@section('title' , 'show')

@section('content')


<div class="card">
    <div class="card-header">
      <h2>  Card Details</h2>

    </div>
    <div class="card-body">
        <h5 class="card-title">Title : {{ $onePost->title }}</h5>
        <p class="card-text"><strong>Content :</strong> {{ $onePost->description }} </p>
        <p class="card-text"><strong>Posted By :</strong> {{ $onePost->user->name }}</p>

    </div>
</div>
<div class="mt-4 card">

    <div class="card-header">
        <h2>Post Creator Information</h2>
    </div>
        <div class="card-body">
            <div class="card-title"><strong>Name: </strong>{{ $onePost->user->name }}</div>
            <div class="card-title"><strong>Email: </strong>{{ $onePost->user->email }}</div>
            <div class="card-title"><strong>Create At: </strong>{{ $onePost->user->created_at }}</div>
        </div>
</div>


</tbody>
</table>

@endsection
