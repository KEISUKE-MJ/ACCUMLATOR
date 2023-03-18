<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use HasFactory, SoftDeletes;

    Protected $fillable = [
        'meeting_date',
        'participant_matsui',
        'participant_client',
        'content',
        'image',
        'client_id',
        'user_id',
        'status_id',
        'project_id',
    ];

    protected $guarded = ['created_at', 'updated_at'];

    public function project(){

        return $this->belongsTo(Project::class,'project_id');
       
    }

    public function user(){

        return $this->belongsTo(User::class,'user_id');
       
    }

    public function client(){

        return $this->belongsTo(Client::class,'client_id');
       
    }
    
    public function status(){

        return $this->belongsTo(Status::class,'status_id');
       
    }
}
