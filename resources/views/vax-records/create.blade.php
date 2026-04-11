@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header py-3 px-4" style="background: linear-gradient(135deg, #235347 0%, #163832 100%);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-white mb-0">
                            <i class="fas fa-plus-circle me-2"></i> Add Vaccination Record
                        </h4>
                        <a href="{{ route('patients.vaxRecords.index', $patient) }}" class="btn btn-light btn-sm rounded-pill">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                    <p class="text-white-50 mb-0 small mt-1">
                        <i class="fas fa-user me-1"></i> Patient: {{ $patient->fname }} {{ $patient->lname }}
                    </p>
                </div>
                
                <div class="card-body p-4">
                    <form action="{{ route('patients.vaxRecords.store', $patient) }}" method="POST">
                        @csrf
                        
                        <div class="row g-4">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Date of Exposure <span class="text-danger">*</span></label>
                                    <input type="date" name="date_of_exposure" class="form-control rounded-3 @error('date_of_exposure') is-invalid @enderror" required>
                                    @error('date_of_exposure')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Place of Exposure</label>
                                    <input type="text" name="place_of_exposure" class="form-control rounded-3" placeholder="e.g., Barangay Hall, School, Street">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Exposure Type <span class="text-danger">*</span></label>
                                    <input type="text" name="exposure_type" class="form-control rounded-3 @error('exposure_type') is-invalid @enderror" placeholder="e.g., Bite, Scratch, Lick" required>
                                    @error('exposure_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Animal Condition <span class="text-danger">*</span></label>
                                    <select name="animal_condition" class="form-select rounded-3 @error('animal_condition') is-invalid @enderror" required>
                                        <option value="Healthy">Healthy</option>
                                        <option value="Sick">Sick</option>
                                        <option value="Lost">Lost</option>
                                        <option value="Dead">Dead</option>
                                    </select>
                                    @error('animal_condition')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Rabies Brand <span class="text-danger">*</span></label>
                                    <select name="rig_brand" class="form-select rounded-3 @error('rig_brand') is-invalid @enderror" required>
                                        <option value="">Select Rabies Vaccine Brand</option>
                                        <option value="Abhayrab">Abhayrab</option>
                                        <option value="ChiroRab">ChiroRab</option>
                                        <option value="VaxiRab">VaxiRab</option>
                                        <option value="Verorab">Verorab</option>
                                        <option value="Speeda">Speeda</option>
                                    </select>
                                    @error('rig_brand')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Date of Visit <span class="text-danger">*</span></label>
                                    <input type="date" name="date_of_visit" class="form-control rounded-3 @error('date_of_visit') is-invalid @enderror" required>
                                    @error('date_of_visit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Animal Type <span class="text-danger">*</span></label>
                                    <input type="text" name="animal_type" class="form-control rounded-3 @error('animal_type') is-invalid @enderror" placeholder="e.g., Dog, Cat, Bat, Monkey, Cow, Goat, Horse, etc." required>
                                    @error('animal_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Enter the specific animal that caused the bite/exposure</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Exposure Category <span class="text-danger">*</span></label>
                                    <select name="exposure_category" class="form-select rounded-3 @error('exposure_category') is-invalid @enderror" required>
                                        <option value="">Select Category</option>
                                        <option value="I">Category I - Touching/feeding animals, intact skin</option>
                                        <option value="II">Category II - Nibbling uncovered skin, minor scratches</option>
                                        <option value="III">Category III - Transdermal bites, scratches, contamination of mucous membrane</option>
                                    </select>
                                    @error('exposure_category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Tetanus Brand</label>
                                    <input type="text" name="tetanus_brand" class="form-control rounded-3" placeholder="e.g., Tetavax, Tetanus Toxoid, etc.">
                                    @error('tetanus_brand')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Vaccination Schedule Section -->
                            <div class="col-12">
                                <div class="card rounded-3 mt-2" style="background: var(--bg-secondary); border: 1px solid var(--border-color);">
                                    <div class="card-header" style="background: #DAFIDE;">
                                        <h5 class="mb-0 fw-semibold" style="color: #235347;">
                                            <i class="fas fa-calendar-alt me-2"></i> Vaccination Schedule
                                        </h5>
                                        <small class="text-muted">Select which vaccine doses to schedule (based on Date of Visit)</small>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex flex-wrap gap-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="vaccination_days[]" value="Day 0" id="day0" class="form-check-input">
                                                        <label class="form-check-label fw-semibold" for="day0">Day 0 (Today)</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="vaccination_days[]" value="Day 3" id="day3" class="form-check-input">
                                                        <label class="form-check-label fw-semibold" for="day3">Day 3</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="vaccination_days[]" value="Day 7" id="day7" class="form-check-input">
                                                        <label class="form-check-label fw-semibold" for="day7">Day 7</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="vaccination_days[]" value="Day 14" id="day14" class="form-check-input">
                                                        <label class="form-check-label fw-semibold" for="day14">Day 14</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="vaccination_days[]" value="Day 28" id="day28" class="form-check-input">
                                                        <label class="form-check-label fw-semibold" for="day28">Day 28</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="form-check">
                                                <input type="checkbox" id="selectAll" class="form-check-input">
                                                <label class="form-check-label fw-semibold" style="color: #9EB698;">Select All Doses</label>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <small class="text-muted">
                                                <i class="fas fa-info-circle me-1"></i> 
                                                Doses will be scheduled based on the Date of Visit: Day 0 = Visit Date, Day 3 = Visit Date + 3 days, etc.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Remarks -->
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Remarks</label>
                                    <textarea name="remarks" class="form-control rounded-3" rows="3" placeholder="Additional notes about the exposure, treatment, or patient condition..."></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-3 justify-content-end mt-4 pt-3">
                            <a href="{{ route('patients.vaxRecords.index', $patient) }}" class="btn btn-outline-secondary rounded-pill px-4">Cancel</a>
                            <button type="submit" class="btn px-4 rounded-pill text-white" style="background: linear-gradient(135deg, #9EB698 0%, #235347 100%);">
                                <i class="fas fa-save me-2"></i> Create Record
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Select All functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const dayCheckboxes = document.querySelectorAll('input[name="vaccination_days[]"]');
    
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            dayCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });
        
        dayCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allChecked = Array.from(dayCheckboxes).every(cb => cb.checked);
                selectAllCheckbox.checked = allChecked;
            });
        });
    }
</script>
@endsection