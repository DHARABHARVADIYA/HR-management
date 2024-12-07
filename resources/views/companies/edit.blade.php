@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header  text-white">
            <h5 class="mb-0">Edit Company</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  
                    <div class="col-md-6 mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control" 
                            value="{{ $company->company_name }}" required>
                    </div>

                   
                    <div class="col-md-6 mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" id="state" class="form-control" 
                            value="{{ $company->state }}" required>
                    </div>
                </div>

                <div class="row">
                   
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" class="form-control" 
                            value="{{ $company->city }}" required>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control" rows="3" required>{{ $company->address }}</textarea>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label for="logo" class="form-label">Company Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                        @if ($company->logo)
                            <p class="mt-2">Current Logo:</p>
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="img-thumbnail" width="120">
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                   
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                  
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
