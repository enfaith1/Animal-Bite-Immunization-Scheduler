<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaxRecord extends Model
{
    protected $fillable = [
        'date_of_exposure',
        'date_of_visit',
        'place_of_exposure', 
        'exposure_type', //no need for enum, typed by user
        'animal_type',
        'animal_condition',
        'exposure_category',
        'remarks'
    ];

    /** @use HasFactory<\Database\Factories\VaxRecordFactory> */
    use HasFactory;

    //Relationship: Each VaxRecord has one Patient
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}
