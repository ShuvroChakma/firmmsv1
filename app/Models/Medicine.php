<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function medicine_stocks()
    {
        return $this->hasMany(MedicineStockHistory::class);
    }

    public function vaccinations()
    {
        return $this->hasMany(VaccinationHistory::class);
    }
}
