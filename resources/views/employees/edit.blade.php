@extends('layouts.admin')

@section('content')
<div class="container">
    <h5>Edit Employee</h5>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('employees.form', ['employee' => $employee])
        <!-- <button type="submit" class="btn btn-success">Update</button> -->
    </form>
</div>
@endsection
