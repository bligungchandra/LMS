<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $primaryKey = "trainingID";
    protected $guarded = [];

    public function trainingDocument()
    {
        return $this->hasMany(TrainingDocument::class,'trainingID');
    }
}
