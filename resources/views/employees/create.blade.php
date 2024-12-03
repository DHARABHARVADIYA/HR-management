@extends('layouts.admin')

@section('content')
<div class="container">
    <h5>Add Employee</h5>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        @include('employees.form')
        <!-- <button type="submit" class="btn btn-success">Save</button> -->
    </form>
</div>
@endsection
