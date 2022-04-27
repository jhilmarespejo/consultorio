<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashRegister extends Model
{
    use HasFactory;
    protected $fillable = ['clinic_id', 'income', 'expenses', 'credit', 'date','observations'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
