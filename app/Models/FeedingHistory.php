<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedingHistory extends Model
{
    use HasFactory;
    protected $guarded=["id"];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
