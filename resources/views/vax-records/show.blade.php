@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header py-3 px-4" style="background: linear-gradient(135deg, #235347 0%, #163832 100%);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-white mb-0">
                            <i class="fas fa-file-medical me-2"></i> Vaccination Record
                        </h4>
                        <div class="d-flex gap-2">
                            <a href="{{ route('patients.vaxRecords.index', $patient) }}" class="btn btn-light btn-sm rounded-pill">
                                <i class="fas fa-arrow-left me-1"></i> Back to List
                            </a>
                        </div>
                    </div>
                    <p class="text-white-50 mb-0 small mt-1">
                        <i class="fas fa-user me-1"></i> Patient: {{ $patient->fname }} {{ $patient->lname }}
                    </p>
                </div>
                
                <div class="card-body p-4">
                    <!-- ========== TOP HALF: READ ONLY RECORD INFORMATION ========== -->
                    <div class="card rounded-3 mb-4" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                        <div class="card-header" style="background: #DAFIDE;">
                            <h5 class="mb-0 fw-semibold" style="color: #235347;">
                                <i class="fas fa-info-circle me-2"></i> Record Information (Read Only)
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">RECORD ID</label>
                                        <p class="fw-medium fs-5 mb-0">{{ $vaxRecord->id }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">DATE OF EXPOSURE</label>
                                        <p class="fw-medium mb-0">{{ date('F d, Y', strtotime($vaxRecord->date_of_exposure)) }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">EXPOSURE TYPE</label>
                                        <p class="fw-medium mb-0">{{ $vaxRecord->exposure_type }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">EXPOSURE CATEGORY</label>
                                        <p class="fw-medium mb-0">
                                            <span class="badge rounded-pill px-3 py-1" style="background: @if($vaxRecord->exposure_category == 'I') #28a745 @elseif($vaxRecord->exposure_category == 'II') #ffc107 @else #dc3545 @endif; color: @if($vaxRecord->exposure_category == 'II') #000 @else #fff @endif;">
                                                Category {{ $vaxRecord->exposure_category }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">PLACE OF EXPOSURE</label>
                                        <p class="fw-medium mb-0">{{ $vaxRecord->place_of_exposure ?: 'N/A' }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">DATE OF VISIT</label>
                                        <p class="fw-medium mb-0">{{ date('F d, Y', strtotime($vaxRecord->date_of_visit)) }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">ANIMAL TYPE</label>
                                        <p class="fw-medium mb-0">{{ $vaxRecord->animal_type }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">ANIMAL CONDITION</label>
                                        <p class="fw-medium mb-0">{{ $vaxRecord->animal_condition }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">ANTIRABIES BRAND</label>
                                        <p class="fw-medium mb-0">{{ $vaxRecord->vaxSchedules->first()?->vaxBrand->brand_name ?: 'N/A' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">RIG BRAND</label>
                                        <p class="fw-medium mb-0">{{ $vaxRecord->rig_brand ?: 'N/A' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">TETANUS BRAND</label>
                                        <p class="fw-medium mb-0">{{ $vaxRecord->tetanus_brand ?: 'N/A' }}</p>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold text-muted small">REMARKS</label>
                                        <p class="fw-medium mb-0">{{ $vaxRecord->remarks ?: 'No remarks' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ========== BOTTOM HALF: EDITABLE VACCINATION SCHEDULE ========== -->
                    <div class="card rounded-3" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                        <div class="card-header" style="background: #DAFIDE;">
                            <h5 class="mb-0 fw-semibold" style="color: #235347;">
                                <i class="fas fa-calendar-check me-2"></i> Vaccination Schedule (Editable)
                            </h5>
                        </div>
                        <div class="card-body">
                            @if($vaxRecord->vaxSchedules->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead style="background: #DAFIDE;">
                                            <tr>
                                                <th class="py-2">Dose Day</th>
                                                <th class="py-2">Scheduled Date</th>
                                                <th class="py-2">Status</th>
                                                <th class="py-2">Administered Date</th>
                                                <th class="py-2 text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($vaxRecord->vaxSchedules as $schedule)
                                            <form action="{{ route('vaxSchedules.update', $schedule) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <tr>
                                                    <td class="fw-semibold">{{ $schedule->dose_day }}</td>
                                                    <td>{{ date('F d, Y', strtotime($schedule->scheduled_date)) }}</td>
                                                    <td>
                                                        <select name="status" class="form-select form-select-sm rounded-pill" style="width: auto; min-width: 110px;">
                                                            <option value="Upcoming" {{ $schedule->status == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                                                            <option value="Completed" {{ $schedule->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                            <option value="Missed" {{ $schedule->status == 'Missed' ? 'selected' : '' }}>Missed</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="date" name="actual_date" class="form-control form-control-sm" style="width: auto; min-width: 130px;" value="{{ $schedule->actual_date ? date('Y-m-d', strtotime($schedule->actual_date)) : '' }}">
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="submit" class="btn btn-sm rounded-pill px-3 text-white" style="background: linear-gradient(135deg, #9EB698 0%, #235347 100%);">
                                                            <i class="fas fa-save me-1"></i> Update
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-muted text-center mb-0 py-3">No vaccination schedules created for this record.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection