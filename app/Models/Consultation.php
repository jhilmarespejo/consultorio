<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'user_id', 'motive', 'description', 'diagnostic', 'forecast', 'treatment', 'observations'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vitalSign()
    {
        return $this->hasMany(VitalSign::class);
    }

    public function exam()
    {
        return $this->hasMany(Exam::class);
    }

    public function prescription()
    {
        return $this->hasMany(Prescription::class);
    }
    
    public function document()
    {
        return $this->hasMany(Document::class);
    }

}
