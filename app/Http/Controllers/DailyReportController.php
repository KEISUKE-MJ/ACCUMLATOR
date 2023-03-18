<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DailyReport;
use App\Models\Project;
use App\Models\Client;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class DailyReportController extends Controller
{
    public function index()
    {
        $dailyreports = DailyReport::with(['project', 'client', 'user', 'status'])->paginate(10);
        return view('dailyreport.index', compact('dailyreports'));
    }

    public function create()
    {
        $dailyreport = DailyReport::with(['project', 'client', 'user', 'status'])->get();
        $projects = Project::get();
        $authuser = Auth::user();
        $clients = Client::get();
        $statuses = Status::get();
        return view('dailyreport.create', compact('dailyreport', 'projects', 'authuser', 'clients', 'statuses'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'meeting_date' => ['required'],
            'client_id' => ['required'],
            'participant_matsui' => ['required'],
            'participant_client' => ['required'],
            'project_id' => ['required'],
            'status_id' => ['required'],
            'user_id' => ['required'],
            'image' => ['required'],
            'content' => ['required'],

        ]);

        Dailyreport::create([
            'meeting_date' => $request->meeting_date,
            'client_id' => $request->client_id,
            'participant_matsui' => $request->participant_matsui,
            'participant_client' => $request->participant_client,
            'project_id' => $request->project_id,
            'status_id' => $request->status_id,
            'user_id' => $request->user_id,
            'image' => $request->image,
            'content' => $request->content,
        ]);

        return redirect()->route('dailyreport.index');
    }

    public function show($id)
    {
        $dailyreport = DailyReport::with(['project', 'client', 'user', 'status'])->findOrFail($id);
        return view('dailyreport.show', compact('dailyreport'));
    }

    public function edit($id)
    {
        $dailyreport = DailyReport::with(['project', 'client', 'user', 'status'])->findOrFail($id);
        $projects = Project::get();
        $authuser = Auth::user();
        $clients = Client::get();
        $statuses = Status::get();
        return view('dailyreport.edit', compact('dailyreport', 'projects', 'authuser', 'clients', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $dailyreport = DailyReport::with(['project', 'client', 'user', 'status'])->findOrFail($id);
        $dailyreport->meeting_date = $request->meeting_date;
        $dailyreport->client_id = $request->client_id;
        $dailyreport->participant_matsui = $request->participant_matsui;
        $dailyreport->participant_client = $request->participant_client;
        $dailyreport->project_id = $request->project_id;
        $dailyreport->status_id = $request->status_id;
        $dailyreport->image = $request->image;
        $dailyreport->content = $request->content;

        $dailyreport->save();

        return redirect()
        ->route('dailyreport.show',$id)
        ->with('message',"日報を更新しました");
    }

    public function destroy($id)
    {
        DailyReport::findOrFail($id)->delete();

        return redirect()
        ->route('dailyreport.index')
        ->with('message',"日報を削除しました");
    }
}
