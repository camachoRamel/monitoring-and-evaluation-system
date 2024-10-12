<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WeeklyTask extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function weeklyReport() : HasOne
    {
        return $this->hasOne(WeeklyReport::class);
    }

    public function weeklyEvaluation() : HasOne
    {
        return $this->hasOne(WeeklyEvaluation::class);
    }
}
