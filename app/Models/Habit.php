<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'nutrition', 'appetite', 'gut_catharsis', 'diuresis', 'sleep', 'alcohol', 'infusions', 'drugs', 'tobacco', 'observations']; 

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
