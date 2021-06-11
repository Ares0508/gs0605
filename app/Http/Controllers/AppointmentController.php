<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Address;
use App\Models\CategoryCode;
use App\Models\PostingVender;
use App\Models\Service;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData() {
        $json_data = Appointment::all();
        return response()->json($json_data);
    }

    public function index()
    {
        return view('appt.index');
    }
    
    public function confirm()
    {
        return view('appt.confirm');
    }
    
    public function done()
    {
        return view('appt.done');
    }

    public function search(Request $request)
    {
        $customer = Customer::where('name', $request->q)
                            ->orWhere('gender', $request->q)
                            ->orWhere('phone', $request->q)->first();
        $addr = null;
        if(!empty($customer)) {
            $addr = Address::where('customer_id', $customer->id)->first();
        }
        return response()->json(compact('customer', 'addr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posting_venders = PostingVender::orderBy('id','asc')->pluck('name', 'id');
        $posting_venders = $posting_venders -> prepend('', '');

        $category_codes = CategoryCode::orderBy('id','asc')->pluck('category_code', 'id');
        $category_codes = $category_codes -> prepend('', '');

        $services = Service::orderBy('id','asc')->pluck('service', 'id');

        return view('appt.create')->with(['category_codes' => $category_codes, 'posting_venders' => $posting_venders, 'services' => $services ]);
    }

    public function create2(Request $request, $user, $appt)
    {
        $addr  = Address::where('customer_id', $user)->first();
        $appoint  = Appointment::find($appt);
        $appoints  = Appointment::where('appointments.id', '!=', $appt)->join('addresses', 'appointments.customer_id', 'addresses.customer_id')->get(['appointments.*', 'addresses.postal_code']);

        return view('appt.create2', compact('addr', 'appoint', 'appoints'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->is_draft) && $request->is_draft == 1) {
            $customer = Customer::where('phone', $request->phone)->first();
            if(!$customer) {
                $customer = new Customer;
            }
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->gender = $request->gender;
            $customer->save();

            $addr = Address::where('postal_code', $request->postal_code)->first();
            if(!$addr) {
                $addr = new Address;
            }
            $addr->customer_id = $customer->id;
            $addr->postal_code = $request->postal_code;
            $addr->prefecture = $request->prefecture;
            $addr->city = $request->city;
            $addr->address = $request->address;
            $addr->save();

            $appt = new Appointment;
            $appt->customer_id = $customer->id;
            $appt->service_id = $request->service;
            $appt->category_code_id = $request->category;
            $appt->employee_id = $request->vender;
            $appt->employee_eigyo_id = 0;
            $appt->truck_id = 0;
            $appt->title = '';
            $appt->start = date('Y-m-d');
            $appt->end = date('Y-m-d');
            $appt->content = $request->content;
            $appt->comment = $request->comment;

            $appt->save();
            return redirect('/appointment/create2/'.$customer->id.'/'.$appt->id);
        } else {
            $y = $request->year;
            $m = $request->month;
            $d = $request->day;
            list($s, $e) = explode('@', $request->time);
            $appt = Appointment::find($request->id);
            $appt->start = $y.'-'.$m.'-'.$d.' '.$s;
            $appt->end = $y.'-'.$m.'-'.$d.' '.$e;
            return redirect('/appointment/done');
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
