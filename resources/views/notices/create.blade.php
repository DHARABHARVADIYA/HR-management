@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Create New Notice</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notices.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="notice_type">Notice Type</label>
            <input type="text" name="notice_type" id="notice_type" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="notice_description">Notice Description</label>
            <textarea name="notice_description" id="notice_description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="notice_date">Notice Date</label>
            <input type="date" name="notice_date" id="notice_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="notice_attachment">Notice Attachment</label>
            <input type="file" name="notice_attachment" id="notice_attachment" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit Notice</button>
    </form>
</div>
@endsection
