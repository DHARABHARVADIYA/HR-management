@extends('layouts.admin')

@section('content')
<div class="container">
    <h5>User List</h5>

   
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 float-right">Add User</a>

   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <!-- <span class="badge badge-info">{{ $role->name }}</span> -->
                            <a href="{{ route('users.roles', $user->id) }}" class="btn btn-outline-info btn-sm">Roles</a>
                        @endforeach
                    </td>
                    <td>
                        <!-- Edit Button with Icon -->
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="fas fa-edit"></i> <!-- Edit Icon -->
                        </a>

                        <!-- Delete Button with Icon -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn  btn-sm btn-outline-danger"
                                onclick="return confirm('Are you sure you want to delete this user?')">
                                <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection