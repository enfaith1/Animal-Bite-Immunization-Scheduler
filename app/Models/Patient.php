<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    }
}
