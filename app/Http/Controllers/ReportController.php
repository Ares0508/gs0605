<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Appointment;
use App\Models\Result;
use App\Models\Goal;

class ReportController extends Controller
{
    public function index()
    {
        $users = Employee::all();
        return view('report.index', compact('users'));
    }

    public function calcData($id)
    {
        
        $eigyo_appt_sum = Appointment::whereYear('result_created_at', 2021)
        ->orderBy('result_created_at')
        ->get()
        ->groupBy(function ($row) {
            return $row->created_at->format('m');
        })
        ->map(function ($day) {
            return $day->sum('count');
        });
        
        
        
        /////
        //契約件数
        $eigyo_keiyaku = Appointment::where('user_eigyo_id', user_eigyo_id)->get();
        $eigyo_keiyaku_sum = $eigyo_keiyaku::where('result_code_id', 120)->get();
        $eigyo_keiyaku_sum = $eigyo_keiyaku_sum->count();
        
        
        $users = UserEigyo::all();
        $appointments = Appointment::all();
        $results = Result::all();
        $goals = Goal::all();
        
        return view('report.index', compact('user','eigyo_appt_sum','eigyo_keiyaku_sum'));
    }
    
    public function getData() {
        $json_data = Appointment::all();
        return response()->json($json_data);
    }
}
