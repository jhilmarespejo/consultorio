<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAppointment extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'date', 'hour', 'observations']; 

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
