@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Assign Permissions to {{ $user->name }}</h2>

       
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('users.updateRoles', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

           
            <div class="form-group">
                <label for="permissions">Select Permissions for Department</label>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Permission</th>
                            <th>Module</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions->where('module', 'department')->take(4) as $permission)  <!-- Limit to 4 -->
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                           @if(in_array($permission->id, $userPermissions)) checked @endif>
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ ucfirst($permission->module) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

           
            <div class="form-group">
                <label for="permissions">Select Permissions for Subdepartment</label>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Permission</th>
                            <th>Module</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions->where('module', 'subdepartment')->take(4) as $permission)  <!-- Limit to 4 -->
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                           @if(in_array($permission->id, $userPermissions)) checked @endif>
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ ucfirst($permission->module) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-primary">Update Permissions</button>
        </form>
    </div>
@endsection
