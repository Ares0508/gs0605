<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\Employee;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Employee::all();
        return view('goal.index', compact('users'));
    }

    public function getData(Request $request) {
        $data = Goal::where('month', '=', $request->key)->get();

        echo json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->data;
        foreach($data as $row) {
            $goal = Goal::where('employee_id', $row['employee_id'])
                        ->where('month', $row['month'])->first();
            if(empty($goal)) {
                $goal = new Goal;
            }
            $goal->employee_id = $row['employee_id'];
            $goal->month = $row['month'];
            $goal->goal = $row['goal'] ? $row['goal'] : 0;
            $goal->save();

        }

        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
