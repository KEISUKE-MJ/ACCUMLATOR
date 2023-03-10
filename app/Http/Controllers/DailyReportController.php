<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyReport;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class DailyReportController extends Controller
{
    public function index(){
        // $testE = DailyReport::all();
        // $testQ = DB::table('daily_reports')->select('participant_matsui')->get();
        // $dailyreport = Project::all();
        
        $dailyreports = DailyReport::with(['project','client'])->get();
        return view('dailyreport.index',compact('dailyreports'));
    }
}
