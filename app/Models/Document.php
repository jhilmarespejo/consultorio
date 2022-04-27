<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['consultation_id', 'name', 'description', 'url', 
'observations' ]; 

    
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}

