@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h1 class="fw-bold" style="color: var(--text-primary); font-size: 2rem;">
                        <i class="fas fa-users me-3" style="color: #9EB698;"></i>
                        Patient Records
                    </h1>
                    <p class="text-muted mt-2">Manage and track all patients in the immunization system</p>
                </div>
                <a href="{{ route('patients.create') }}" class="btn btn-primary-custom btn-modern">
                    <i class="fas fa-plus me-2"></i> Add New Patient
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-modern">
                <div class="card-header-modern">
                    <i class="fas fa-list me-2"></i> All Patients
                    <span class="badge bg-light text-dark ms-2">{{ $patients->total() }} total</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Emergency Contact</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($patients as $patient)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $patient->patient_id }}</span>
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ $patient->fname }} {{ $patient->lname }}</div>
                                        <small class="text-muted"><i class="fas fa-map-marker-alt me-1" style="font-size: 10px;"></i> {{ Str::limit($patient->address, 40) }}</small>
                                    </td>
                                    <td>
                                        <i class="fas fa-phone me-1" style="color: #9EB698;"></i> {{ $patient->contact_num }}
                                    </td>
                                    <td>
                                        <i class="fas fa-envelope me-1" style="color: #9EB698;"></i> {{ Str::limit($patient->email, 25) }}
                                    </td>
                                    <td>
                                        <i class="fas fa-phone-alt me-1" style="color: #9EB698;"></i> {{ $patient->emergency_num }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('patients.show', $patient->patient_id) }}" class="btn btn-sm btn-primary-custom" style="padding: 6px 12px; border-radius: 8px; margin: 0 3px;">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('patients.edit', $patient->patient_id) }}" class="btn btn-sm btn-warning-custom" style="padding: 6px 12px; border-radius: 8px; margin: 0 3px;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('patients.destroy', $patient->patient_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger-custom" onclick="return confirm('Delete this patient? This action cannot be undone.')" style="padding: 6px 12px; border-radius: 8px; margin: 0 3px;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-user-slash fa-4x mb-3" style="color: #9EB698;"></i>
                                        <h4 class="fw-bold">No Patients Found</h4>
                                        <p class="text-muted">Click "Add New Patient" to get started with your first patient record.</p>
                                        <a href="{{ route('patients.create') }}" class="btn btn-primary-custom btn-modern mt-3">
                                            <i class="fas fa-plus me-2"></i> Add Your First Patient
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($patients->hasPages())
                <div class="card-footer bg-transparent border-0 py-3">
                    <div class="d-flex justify-content-center">
                        {{ $patients->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection