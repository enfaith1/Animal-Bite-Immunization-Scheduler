<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VaxRecord extends Model
{
    protected $casts = [
        'date_of_visit' => 'date',
    ];

    protected $fillable = [
        'patient_id',
        'date_of_exposure',
        'date_of_visit',
        'place_of_exposure', 
        'exposure_type', //no need for enum, typed by user
        'animal_type',
        'animal_condition',
        'exposure_category',
        'rig_brand',
        'tetanus_brand',
        'remarks'
    ];

    /** @use HasFactory<\Database\Factories\VaxRecordFactory> */
    use HasFactory;

    //Relationship: Each VaxRecord has one Patient
    public function patient() {
        return $this->belongsTo(Patient::class);
        //Direct access to Patient via VaxRecord::find($id)->patient;
    }

    //Relationship: Each VaxRecord has multiple VaxSchedules
    public function vaxSchedules():HasMany {
        return $this->hasMany(VaxSchedule::class, 'vax_record_id', 'id');
        //Direct access to VaxSchedule;
    }
}
