<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaxBrand extends Model
{
    protected $fillable = [
        'brand_name',
        'type'
    ];

    /** @use HasFactory<\Database\Factories\VaxBrandFactory> */
    use HasFactory;

    //Relationship: Each VaxBrand has multiple VaxSchedules
    public function vaxSchedules() {
        return $this->hasMany(VaxSchedule::class);
        // direct access to VaxSchedules via VaxBrand::find(1)->vaxSchedules
    }
}
