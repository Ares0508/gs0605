<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Address;
use App\Models\CategoryCode;
use App\Models\PostingVender;
use App\Models\Service;
use App\Models\PostalCode;

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

    public function confirm($id)
    {
        $appoint  = Appointment::find($id);
        $addr  = Address::where('customer_id', $appoint->customer_id)->first();
        $customer  = Customer::find($appoint->customer_id);
        return view('appt.confirm', compact('appoint', 'addr', 'customer'));
    }

    public function done()
    {
        return view('appt.done');
    }

    public function search(Request $request)
    {
        if($request->type == 'customer') {
            $customer = Customer::leftJoin('addresses', 'customers.id', 'addresses.customer_id')
                                ->where('customers.name', 'like',  '%'.$request->q.'%')
                                ->orWhere('customers.gender','like',  '%'.$request->q.'%')
                                ->orWhere('customers.phone','like',  '%'.$request->q.'%')
                                ->select('customers.*', 'addresses.postal_code', 'addresses.prefecture', 'addresses.city', 'addresses.address')
                                ->groupBy('customers.id')->get();

            return response()->json($customer);
        } else {
            $postal_code = DB::table('postal_codes')->whereRaw("first_code=SUBSTR('".(int)($request->q)."',1,LENGTH(first_code)) AND last_code=SUBSTR('".$request->q."',-LENGTH(last_code))")
                ->orderByRaw('LENGTH(first_code) DESC, LENGTH(last_code) DESC')->limit(1)->get();
            return response()->json($postal_code);
        }
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

    public function create2(Request $request, $id)
    {
        $appoint  = Appointment::find($id);
        $addr  = Address::where('customer_id', $appoint->customer_id)->first();
        $appoints  = Appointment::where('appointments.id', '!=', $id)->leftJoin('addresses', 'appointments.customer_id', 'addresses.customer_id')
                        ->select(['appointments.*', 'addresses.postal_code'])->groupBy(['appointments.id'])->get();
        $postal_code = $request->session()->get('postal_code');
        return view('appt.create2', compact('addr', 'appoint', 'appoints', 'postal_code'));
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
            $request->session()->put('postal_code', $request->postal_code);
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
            return redirect('/appointment/create2/'.$appt->id);
        } else {
            $y = $request->year;
            $m = $request->month;
            $d = $request->day;
            list($s, $e) = explode('@', $request->time);
            $appt = Appointment::find($request->id);
            $appt->start = $y.'-'.$m.'-'.$d.' '.$s;
            $appt->end = $y.'-'.$m.'-'.$d.' '.$e;
            $appt->save();
            return redirect('/appointment/confirm/'.$appt->id);
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
