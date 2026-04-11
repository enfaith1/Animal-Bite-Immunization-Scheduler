@extends('layouts.app')

@section('content')
<style>
    .btn-open {
        background: var(--btn-open-bg);
        color: var(--btn-open-text);
        border: 1px solid var(--btn-open-border);
        transition: all 0.3s ease;
    }
    .btn-open:hover {
        background: var(--btn-open-hover);
        transform: translateY(-2px);
    }
    .btn-edit {
        background: var(--btn-edit-bg);
        color: var(--btn-edit-text);
        border: 1px solid var(--btn-edit-border);
        transition: all 0.3s ease;
    }
    .btn-edit:hover {
        background: var(--btn-edit-hover);
        transform: translateY(-2px);
    }
    .btn-delete {
        background: var(--btn-delete-bg);
        color: var(--btn-delete-text);
        border: 1px solid var(--btn-delete-border);
        transition: all 0.3s ease;
    }
    .btn-delete:hover {
        background: var(--btn-delete-hover);
        transform: translateY(-2px);
    }
    
    /* Light Mode Variables */
    [data-bs-theme="light"] {
        --btn-open-bg: #e3f2fd;
        --btn-open-text: #0d47a1;
        --btn-open-border: #90caf9;
        --btn-open-hover: #bbdef5;
        --btn-edit-bg: #fff3e0;
        --btn-edit-text: #e65100;
        --btn-edit-border: #ffcc80;
        --btn-edit-hover: #ffe0b2;
        --btn-delete-bg: #ffebee;
        --btn-delete-text: #c62828;
        --btn-delete-border: #ef9a9a;
        --btn-delete-hover: #ffcdd2;
    }
    
    /* Dark Mode Variables */
    [data-bs-theme="dark"] {
        --btn-open-bg: #1a237e;
        --btn-open-text: #DAFIDE;
        --btn-open-border: #283593;
        --btn-open-hover: #283593;
        --btn-edit-bg: #4e342e;
        --btn-edit-text: #DAFIDE;
        --btn-edit-border: #5d4037;
        --btn-edit-hover: #5d4037;
        --btn-delete-bg: #4a1c1c;
        --btn-delete-text: #DAFIDE;
        --btn-delete-border: #6d2e2e;
        --btn-delete-hover: #5d2626;
    }
    
    /* Table header styling - DARK background with WHITE text */
    .table thead tr {
        background: linear-gradient(135deg, #235347 0%, #163832 100%) !important;
    }
    
    .table thead th {
        color: #ffffff !important;
        font-weight: 600 !important;
        border: none !important;
        padding: 1rem !important;
        background: transparent !important;
    }
    
    /* Dark mode table header - ensure white text */
    [data-bs-theme="dark"] .table thead th {
        color: #ffffff !important;
    }
    
    /* Table body styling */
    .table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .table tbody tr:hover {
        background: rgba(158, 182, 152, 0.1);
    }
    
    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
    }
    
    /* Light mode body text */
    [data-bs-theme="light"] .table td {
        color: #051F20 !important;
    }
    
    /* Dark mode body text */
    [data-bs-theme="dark"] .table td {
        color: #DAFIDE !important;
    }
    
    [data-bs-theme="dark"] .record-id {
        color: #DAFIDE !important;
    }
    
    [data-bs-theme="light"] .record-id {
        color: #235347 !important;
    }
    
    /* Card header styling */
    .card-header-modern {
        background: linear-gradient(135deg, #9EB698 0%, #235347 100%);
        color: white;
        padding: 1rem 1.5rem;
        border: none;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }
    
    .card-header-modern i,
    .card-header-modern h4,
    .card-header-modern span {
        color: white !important;
    }
    
    .card-header-modern .badge {
        background: white !important;
        color: #235347 !important;
    }
    
    /* Card styling */
    .card-modern {
        background: var(--card-bg, #ffffff);
        border: none;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(5, 31, 32, 0.08);
        overflow: hidden;
    }
    
    [data-bs-theme="dark"] .card-modern {
        background: #082826;
    }
    
    /* Fix for light mode card header badge */
    [data-bs-theme="light"] .card-header-modern .badge {
        color: #235347 !important;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Patient Info Hero Section -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
                <div class="card-body p-4" style="background: linear-gradient(135deg, #235347 0%, #163832 100%);">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div>
                                <h1 class="text-white fw-bold mb-2 display-5">{{ $patient->fname }} {{ $patient->lname }}</h1>
                                <div class="d-flex gap-3 mt-2 flex-wrap">
                                    <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                        <i class="fas fa-id-card me-1" style="color: #235347;"></i> Patient ID: {{ $patient->id }}
                                    </span>
                                    <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                        <i class="fas fa-phone me-1" style="color: #235347;"></i> {{ $patient->contact_num }}
                                    </span>
                                    <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                        <i class="fas fa-map-marker-alt me-1" style="color: #235347;"></i> {{ Str::limit($patient->address, 40) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('patients.show', $patient) }}" class="btn btn-outline-light rounded-pill px-4">
                                    <i class="fas fa-arrow-left me-2"></i> Back to Patient
                                </a>
                                <a href="{{ route('patients.vaxRecords.create', $patient) }}" class="btn btn-light rounded-pill px-4" style="color: #235347; font-weight: 600;">
                                    <i class="fas fa-plus me-2"></i> Add Record
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vaccination Records Table -->
            <div class="card-modern">
                <div class="card-header-modern">
                    <i class="fas fa-list me-2"></i> Vaccination Records
                    <span class="badge ms-2">{{ $vaxRecords->total() }} total</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4">ID</th>
                                    <th class="py-3">Date of Exposure</th>
                                    <th class="py-3">Date of Visit</th>
                                    <th class="py-3">Exposure Category</th>
                                    <th class="py-3">Animal Type</th>
                                    <th class="py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vaxRecords as $record)
                                <tr class="border-bottom">
                                    <td class="py-3 px-4">
                                        <span class="fw-bold fs-5 record-id">#{{ $record->id }}</span>
                                    </td>
                                    <td class="py-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fas fa-calendar-alt" style="color: #9EB698;"></i>
                                            <span>{{ date('M d, Y', strtotime($record->date_of_exposure)) }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fas fa-calendar-check" style="color: #9EB698;"></i>
                                            <span>{{ date('M d, Y', strtotime($record->date_of_visit)) }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <span class="badge rounded-pill px-3 py-2" style="background: @if($record->exposure_category == 'I') #28a74520 @elseif($record->exposure_category == 'II') #ffc10720 @else #dc354520 @endif; color: @if($record->exposure_category == 'I') #155724 @elseif($record->exposure_category == 'II') #856404 @else #721c24 @endif; border: 1px solid @if($record->exposure_category == 'I') #28a745 @elseif($record->exposure_category == 'II') #ffc107 @else #dc3545 @endif;">
                                            <i class="fas fa-tag me-1"></i> Category {{ $record->exposure_category }}
                                        </span>
                                    </td>
                                    <td class="py-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fas fa-paw" style="color: #9EB698;"></i>
                                            <span class="fw-medium">{{ $record->animal_type }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 text-center">
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('vaxRecords.show', $record) }}" class="btn btn-sm rounded-pill px-3 btn-open">
                                                <i class="fas fa-eye me-1"></i> Open
                                            </a>
                                            <a href="{{ route('vaxRecords.edit', $record) }}" class="btn btn-sm rounded-pill px-3 btn-edit">
                                                <i class="fas fa-edit me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('vaxRecords.destroy', $record) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm rounded-pill px-3 btn-delete" onclick="return confirm('Delete this record? This action cannot be undone.')">
                                                    <i class="fas fa-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="py-4">
                                            <i class="fas fa-syringe fa-4x mb-3" style="color: #9EB698;"></i>
                                            <h4 class="fw-bold" style="color: #235347;">No Vaccination Records Found</h4>
                                            <p class="text-muted mb-4">This patient doesn't have any vaccination records yet.</p>
                                            <a href="{{ route('patients.vaxRecords.create', $patient) }}" class="btn rounded-pill px-4 py-2 text-white" style="background: linear-gradient(135deg, #9EB698 0%, #235347 100%);">
                                                <i class="fas fa-plus me-2"></i> Add First Record
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($vaxRecords->hasPages())
                <div class="card-footer bg-transparent py-3 border-0">
                    <div class="d-flex justify-content-center">
                        {{ $vaxRecords->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection