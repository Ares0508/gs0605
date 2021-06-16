<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Shift;
use App\Models\Position;
class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Employee::all();
        $positions = Position::orderBy('id','asc')->pluck('position as name', 'id');

        return view('shift.index', compact('users', 'positions'));
    }

    public function getData(Request $request) {
        $query = Shift::whereYear('start', $request->y);
        if($request->unit == 'month') {
            $query->whereMonth('start', $request->m);
        } else if($request->unit == 'day') {
            $query->whereDate('start', $request->d);
        }
        return response()->json($query->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shift.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shift = new Shift;
        $shift->employee_id = $request->employee_id;
        $shift->position_id = $request->position_id;

        $y = $request->year;
        $m = $request->month;
        $d = $request->day;
        list($s, $e) = explode('@', $request->time);
        $shift->start = $y.'-'.$m.'-'.$d.' '.$s;
        $shift->end = $y.'-'.$m.'-'.$d.' '.$e;
        $shift->save();

        return redirect('shift');
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
