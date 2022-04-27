<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo','appointment_interval','clinic','direction','responsable','cellphone','email','nit','registry','Schedule']; 

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function cashRegister()
    {
        return $this->hasMany(CashRegister::class);
    }


    
}
