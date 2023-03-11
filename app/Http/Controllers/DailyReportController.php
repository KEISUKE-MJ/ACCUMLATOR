<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyReport;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class DailyReportController extends Controller
{
    public function index(){       
        $dailyreports = DailyReport::with(['project','client','user','status'])->get();
        return view('dailyreport.index',compact('dailyreports'));
    }

    public function show($id){
        $dailyreport = DailyReport::with(['project','client','user','status'])->findOrFail($id);
        return view('dailyreport.show',compact('dailyreport'));
    }
}
