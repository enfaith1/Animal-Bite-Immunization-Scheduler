<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Patient extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'address',
        'contact_num',
        'email',
        'emergency_num'
    ];
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;

    //Relationship: Patient can have multiple VaxRecords
    public function vaxRecords():HasMany {
        return $this->hasMany(VaxRecord::class, 'patient_id', 'id');
        //Allows direct access to vaxRecords via Patient::find($id)->vaxRecords;
    }

    //Relationship: Has Many Through with VaxSchedules
    public function vaxSchedules(): HasManyThrough {
        return $this->throughVaxRecords()->hasVaxSchedules();
        // return $this->hasManyThrough(VaxSchedule::class, VaxRecord::class, 'patient_id', 'vax_record_id');
    }
}
