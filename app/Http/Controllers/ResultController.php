<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Employee;
use App\Models\Items;
use App\Models\ItemCode;
use App\Models\Results;
use App\Models\ResultCode;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('result.index');
    }

	public function select()
	{
        $data = ResultCode::all();
		return view('result.select', compact('data'));
	}

    public function getData() {
        $json_data = Appointment::all();
        return response()->json($json_data);
    }

    public function indexNull() {
        return view('result.indexwait');
    }

    public function getNull() {
        $json_data = Appointment::whereNull('result_code_id')->get();
        return response()->json($json_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appt  = Appointment::join('customers', 'appointments.customer_id', 'customers.id')->get(['appointments.*', 'customers.name', 'customers.phone', 'customers.gender']);
        return view('result.create', compact('appt'));
    }

    /* 顧客入力画面 */
    public function create2(Request $request)
    {
        $result = $request->session()->get('result');
        $appoint = Appointment::find($result['basic']['appointment_id']);
        $customer = Customer::find($appoint->customer_id);
        $employee = Employee::find($appoint->employee_id);
        $address = Address::where('customer_id', $appoint->customer_id)->get()->first();

        return view('result.create2', compact('result', 'appoint', 'customer', 'address', 'employee'));
    }

    public function signature(Request $request)
    {
        $detail = $request->session()->get('detail');
        return view('result.signature', compact('detail'));
    }

    public function done()
    {
        return view('result.done');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->key == 'signature') {
            $result_data = $request->session()->get('result');
            $detail = $request->session()->get('detail');
            $code = $request->session()->get('code');
            $appoint = Appointment::find($result_data['basic']['appointment_id']);

            $signature = $request->signature;

            $result = new Results;
            $result->appointment_id = $appoint->id;
            $result->result_code_id = $code['result_code'];
            $result->start = $appoint->start;
            $result->end = $appoint->end;
            $result->signature = $signature;
            $result->kaisyu = $kaisyu;
            $result->payment_method = $payment_method;
            $result->payment_total = $payment_total;
            $result->payment_uchi = $payment_uchi;
            $result->payment_zan = $payment_zan;
            $result->save();

            $appoint->result_code_id = $code['result_code'];
            $appoint->result_type = ResultCode::find($code['result_code'])->result_code;
            $appoint->result_created_at = $result->created_at;
            $appoint->save();

            foreach($result_data['contract']['product'] as $k=>$row) {
                $item_code = new ItemCode;
                $item_code->item = $row;
                $item_code->type = 'contract';
                $item_code->save();

                $item = new Items;
                $item->item_id = $item_code->id;
                $item->result_id = $result->id;
                $item->quantity = $result_data['contract']['quantity'][$k];
                $item->price = $result_data['contract']['price'][$k];
                $item->save();
            }

            foreach($result_data['trasnport']['product'] as $row) {
                $item_code = new ItemCode;
                $item_code->item = $row;
                $item_code->type = 'trasnport';
                $item_code->save();

                $item = new Items;
                $item->item_id = $item_code->id;
                $item->result_id = $result->id;
                $item->quantity = $result_data['trasnport']['quantity'][$k];
                $item->price = $result_data['trasnport']['price'][$k];
                $item->save();
            }

            foreach($result_data['workfee']['product'] as $row) {
                $item_code = new ItemCode;
                $item_code->item = $row;
                $item_code->type = 'workfee';
                $item_code->save();

                $item = new Items;
                $item->item_id = $item_code->id;
                $item->result_id = $result->id;
                $item->quantity = $result_data['workfee']['quantity'][$k];
                $item->price = $result_data['workfee']['price'][$k];
                $item->save();
            }
            $request->session()->forget('result');
            $request->session()->forget('detail');
            $request->session()->forget('code');

            // return redirect('/result/'.$request->target);
        } else {
            $request->session()->put($request->key, $_POST);
            return redirect('/result/'.$request->target);
        }
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
