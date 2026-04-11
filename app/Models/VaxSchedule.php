<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaxSchedule extends Model
{
    protected $fillable = [
        'vax_record_id',
        'vax_brand_id',
        'dose_day',
        'scheduled_date',
        'actual_date',
        'status'
    ];

    /** @use HasFactory<\Database\Factories\VaxScheduleFactory> */
    use HasFactory;

    //Relationship: Each VaxSchedule has one VaxRecord
    public function vaxRecord() {
        return $this->belongsTo(VaxRecord::class);
        //direct access to Vaxrecord via VaxSchedule::find($id)->vaxRecord
    }

    //Relationship: Each VaxSchedule has one VaxBrand
    public function vaxBrand() {
        return $this->belongsTo(VaxBrand::class);
        //direct access to VaxBrand
    }

}
