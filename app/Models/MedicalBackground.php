<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalBackground extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'nature', 'type', 'description', 'observations']; 

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
