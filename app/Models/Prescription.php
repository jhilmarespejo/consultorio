<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = ['consultation_id', 'medicine', 'presentation', 'quantity', 'indication', 'observations']; 
    
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
