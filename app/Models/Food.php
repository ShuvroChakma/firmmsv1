<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $guarded=["id"];

    public function stocks()
    {
        return $this->hasMany(FoodStockHistory::class);
    }

    public function feedings()
    {
        return $this->hasMany(FeedingHistory::class);
    }
}
