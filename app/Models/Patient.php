<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['clinic_id', 'names', 'surnames', 'sex', 'birth_date', 'cellphone', 'blood_type', 'cell_reference', 'civil_status', 'mail', 'home', 'responsible_person', 'responsible_person_cell'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function consultation()
    {
        return $this->hasMany(Consultation::class);
    }

    public function allergy()
    {
        return $this->hasMany(Allergy::class);
    }

    public function medicalAppointment()
    {
        return $this->hasMany(MedicalAppointment::class);
    }

    public function medicalBackground()
    {
        return $this->hasMany(MedicalBackground::class);
    }

    public function habit()
    {
        return $this->hasMany(Habit::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

}
