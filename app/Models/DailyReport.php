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


    protected $fillable = [
        'meeting_date',
        'participant_matsui',
        'participant_client',
        'content',
        'image',
        'approval',
        'client_id',
        'user_id',
        'status_id',
        'project_id',
    ];

    protected $guarded = ['created_at', 'updated_at'];

    public function project()
    {

        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user()
    {

        return $this->belongsTo(User::class, 'user_id');
    }

    public function client()
    {

        return $this->belongsTo(Client::class, 'client_id');
    }

    public function status()
    {

        return $this->belongsTo(Status::class, 'status_id');
    }

    const SORT_ORDER = [
        'later' => "0",
        'older' => "1",
        'id_asc' => "2",
        'id_desc' => "3"
    ];

    public function scopeSortDailyReport($query, $sortDailyReport)
    {
        if ($sortDailyReport === null || $sortDailyReport == DailyReport::SORT_ORDER['later']) {
            return $query->orderBy('created_at', 'desc');
        }
        if ($sortDailyReport == DailyReport::SORT_ORDER['older']) {
            return $query->orderBy('created_at', 'asc');
        }
        if ($sortDailyReport === null || $sortDailyReport == DailyReport::SORT_ORDER['id_asc']) {
            return $query->orderBy('id', 'asc');
        }
        if ($sortDailyReport == DailyReport::SORT_ORDER['id_desc']) {
            return $query->orderBy('id', 'desc');
        }
    }

    public function scopeFilterProject($query, $filterProject)
    {
        if ($filterProject != '0') {
            return $query->where('daily_reports.project_id', $filterProject);
        } else {
            return;
        }
    }

    public function scopeFilterStatus($query, $filterStatus)
    {
        if ($filterStatus != '0') {
            return $query->where('daily_reports.status_id', $filterStatus);
        } else {
            return;
        }
    }

    public function scopeFilterUser($query, $filterUser)
    {
        if ($filterUser != '0') {
            return $query->where('daily_reports.user_id', $filterUser);
        } else {
            return;
        }
    }

    public function scopeFilterClient($query, $filterClient)
    {
        if ($filterClient != '0') {
            return $query->where('daily_reports.client_id', $filterClient);
        } else {
            return;
        }
    }
}
