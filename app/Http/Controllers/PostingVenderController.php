<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostingVender;

class PostingVenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getData() {
        $json_data = PostingVender::all();
        return response()->json($json_data);
    }
 
    public function index()
    {
        return view('posting_vender.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posting_vender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posting_vender = new PostingVender;
        $posting_vender->name = $request->name;
        $posting_vender->phone = $request->phone;
        $posting_vender->email = $request->email;
        $posting_vender->postcode = $request->postcode;
        $posting_vender->address = $request->address ;
        $posting_vender->url = $request->url ;
        $posting_vender->save();
        return redirect('/posting-vender');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posting_vender = PostingVender::find($id);
        return view('posting_vender.show', ['posting_vender' => $posting_vender]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posting_vender = PostingVender::find($id);
        return view('posting_vender.edit', ['posting_vender' => $posting_vender]);
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
        $posting_vender = PostingVender::find($id);
        $posting_vender->name = $request->name;
        $posting_vender->phone = $request->phone;
        $posting_vender->email = $request->email;
        $posting_vender->postcode = $request->postcode;
        $posting_vender->address = $request->address ;
        $posting_vender->url = $request->url ;
        $posting_vender->save();
        return redirect("/posting-vender/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posting_vender = PostingVender::find($id);
        $posting_vender->delete();
        return redirect('/posting-vender');
    }
}
