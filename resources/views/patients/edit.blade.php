@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card-modern animate-fade-in">
                <div class="card-header-modern">
                    <i class="fas fa-user-edit me-2"></i> Edit Patient Record
                    <a href="{{ route('patients.index') }}" class="float-end text-white" style="opacity: 0.8;">
                        <i class="fas fa-times me-1"></i> Cancel
                    </a>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('patients.update', $patient) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-user me-1" style="color: #9EB698;"></i> First Name
                                </label>
                                <input type="text" name="fname" class="form-control form-modern @error('fname') is-invalid @enderror" value="{{ old('fname', $patient->fname) }}" required>
                                @error('fname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-user me-1" style="color: #9EB698;"></i> Last Name
                                </label>
                                <input type="text" name="lname" class="form-control form-modern @error('lname') is-invalid @enderror" value="{{ old('lname', $patient->lname) }}" required>
                                @error('lname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-modern">
                                <i class="fas fa-map-marker-alt me-1" style="color: #9EB698;"></i> Address
                            </label>
                            <textarea name="address" class="form-control form-modern @error('address') is-invalid @enderror" rows="2" required>{{ old('address', $patient->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-phone me-1" style="color: #9EB698;"></i> Contact Number
                                </label>
                                <input type="text" name="contact_num" class="form-control form-modern @error('contact_num') is-invalid @enderror" value="{{ old('contact_num', $patient->contact_num) }}" required>
                                @error('contact_num')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label-modern">
                                    <i class="fas fa-envelope me-1" style="color: #9EB698;"></i> Email Address
                                </label>
                                <input type="email" name="email" class="form-control form-modern @error('email') is-invalid @enderror" value="{{ old('email', $patient->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-modern">
                                <i class="fas fa-phone-alt me-1" style="color: #9EB698;"></i> Emergency Contact Number
                            </label>
                            <input type="text" name="emergency_num" class="form-control form-modern @error('emergency_num') is-invalid @enderror" value="{{ old('emergency_num', $patient->emergency_num) }}" required>
                            @error('emergency_num')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4 pt-2">
                            <button type="submit" class="btn btn-warning-custom btn-modern">
                                <i class="fas fa-save me-2"></i> Update Record
                            </button>
                            <a href="{{ route('patients.index') }}" class="btn btn-outline-custom btn-modern">
                                <i class="fas fa-times me-2"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection