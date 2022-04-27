<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;
    protected $fillable = ['consultation_id', 'weight', 'size', 'heart_rate', 'respiratory_rate', 'arterial_pressure', 'observations']; 

    
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
