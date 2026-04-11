@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <!-- Hero Header with Gradient -->
                <div class="text-center py-5 px-3" style="background: linear-gradient(135deg, #235347 0%, #163832 100%);">
                    <h1 class="display-5 fw-bold text-white mb-1">{{ $patient->fname }} {{ $patient->lname }}</h1>
                    <p class="text-white-50 mb-0">
                        <i class="fas fa-id-card me-1"></i> Patient ID: {{ $patient->patient_id }}
                    </p>
                </div>
                
                <div class="card-body p-4" style="background: var(--card-bg);">
                    <!-- Contact Information -->
                    <div class="mb-4">
                        <h4 class="fw-bold mb-3" style="color: #235347;">
                            <i class="fas fa-address-card me-2"></i> Contact Information
                        </h4>
                        
                        <!-- Address Card -->
                        <div class="card mb-3 rounded-3" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                            <div class="card-body py-3">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 mt-1">
                                        <i class="fas fa-map-marker-alt fa-lg" style="color: #9EB698;"></i>
                                    </div>
                                    <div>
                                        <small class="d-block" style="color: var(--text-secondary);">ADDRESS</small>
                                        <span class="fw-medium" style="color: var(--text-primary);">{{ $patient->address }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-3">
                            <!-- Contact Number -->
                            <div class="col-md-6">
                                <div class="card rounded-3 h-100" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                                    <div class="card-body py-3">
                                        <div class="d-flex align-items-start">
                                            <div class="me-3 mt-1">
                                                <i class="fas fa-phone fa-lg" style="color: #9EB698;"></i>
                                            </div>
                                            <div>
                                                <small class="d-block" style="color: var(--text-secondary);">CONTACT NUMBER</small>
                                                <span class="fw-medium" style="color: var(--text-primary);">{{ $patient->contact_num }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="card rounded-3 h-100" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                                    <div class="card-body py-3">
                                        <div class="d-flex align-items-start">
                                            <div class="me-3 mt-1">
                                                <i class="fas fa-envelope fa-lg" style="color: #9EB698;"></i>
                                            </div>
                                            <div>
                                                <small class="d-block" style="color: var(--text-secondary);">EMAIL ADDRESS</small>
                                                <span class="fw-medium" style="color: var(--text-primary);">{{ $patient->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Emergency Contact -->
                        <div class="card mt-3 rounded-3" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                            <div class="card-body py-3">
                                <div class="d-flex align-items-start">
                                    <div class="me-3 mt-1">
                                        <i class="fas fa-phone-alt fa-lg" style="color: #9EB698;"></i>
                                    </div>
                                    <div>
                                        <small class="d-block" style="color: var(--text-secondary);">EMERGENCY CONTACT</small>
                                        <span class="fw-medium" style="color: var(--text-primary);">{{ $patient->emergency_num }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Information -->
                    <div class="mb-4">
                        <h4 class="fw-bold mb-3" style="color: #235347;">
                            <i class="fas fa-info-circle me-2"></i> System Information
                        </h4>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card rounded-3" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                                    <div class="card-body py-3">
                                        <div class="d-flex align-items-start">
                                            <div class="me-3 mt-1">
                                                <i class="fas fa-calendar-plus fa-lg" style="color: #9EB698;"></i>
                                            </div>
                                            <div>
                                                <small class="d-block" style="color: var(--text-secondary);">DATE REGISTERED</small>
                                                <span class="fw-medium" style="color: var(--text-primary);">{{ date('F d, Y h:i A', strtotime($patient->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card rounded-3" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                                    <div class="card-body py-3">
                                        <div class="d-flex align-items-start">
                                            <div class="me-3 mt-1">
                                                <i class="fas fa-calendar-edit fa-lg" style="color: #9EB698;"></i>
                                            </div>
                                            <div>
                                                <small class="d-block" style="color: var(--text-secondary);">LAST UPDATED</small>
                                                <span class="fw-medium" style="color: var(--text-primary);">{{ date('F d, Y h:i A', strtotime($patient->updated_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" style="border-color: var(--border-color);">

                    <!-- Action Buttons -->
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="{{ route('patients.index') }}" class="btn btn-secondary rounded-pill px-4">
                            <i class="fas fa-arrow-left me-2"></i> Back
                        </a>
                        <a href="{{ route('patients.edit', $patient->patient_id) }}" class="btn px-4 py-2 rounded-pill fw-semibold" style="background: #DAF1DE; color: #051F20; border: none;">
                            <i class="fas fa-edit me-2"></i> Edit Patient
                        </a>
                        <a href="{{ route('vax-records.index', $patient->patient_id) }}" class="btn btn-success-custom btn-modern px-4">
                            <i class="fas fa-vaccine me-2"></i> View Vaccination Records
                        </a>
                        <form action="{{ route('patients.destroy', $patient->patient_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn px-4 py-2 rounded-pill fw-semibold text-white" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); border: none;" onclick="return confirm('Delete this patient? This action cannot be undone.')">
                                <i class="fas fa-trash-alt me-2"></i> Delete Patient
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection