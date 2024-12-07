@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Edit Notice</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="notice_type">Notice Type</label>
            <input type="text" name="notice_type" id="notice_type" class="form-control" value="{{ $notice->notice_type }}" required>
        </div>

        <div class="form-group">
            <label for="notice_description">Notice Description</label>
            <textarea name="notice_description" id="notice_description" class="form-control" required>{{ $notice->notice_description }}</textarea>
        </div>

        <div class="form-group">
            <label for="notice_date">Notice Date</label>
            <input type="date" name="notice_date" id="notice_date" class="form-control" value="{{ $notice->notice_date }}" required>
        </div>

        <div class="form-group">
            <label for="notice_attachment">Notice Attachment</label>
            <input type="file" name="notice_attachment" id="notice_attachment" class="form-control">
            @if($notice->notice_attachment)
                <a href="{{ Storage::url($notice->notice_attachment) }}" target="_blank">View Current Attachment</a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Notice</button>
    </form>
</div>
@endsection
