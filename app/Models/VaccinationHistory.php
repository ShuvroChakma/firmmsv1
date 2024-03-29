<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationHistory extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ["medicine"];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
