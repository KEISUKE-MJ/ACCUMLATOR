<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DailyReport;

class Client extends Model
{
    use HasFactory;

    public function dailyreports(){

        return $this->hasMany(DailyReport::class);

    }

}
