<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingDocument extends Model
{
    protected $table = "trainingdocument";
    protected $guarded = [];

    public function document()
    {
        return $this->belongsTo(Training::class,'trainingID');
    }

    
}
