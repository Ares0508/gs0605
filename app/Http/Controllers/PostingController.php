<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData() {
        $json_data = Posting::all();
        return response()->json($json_data);
    }
 
    public function index()
    {
        return view('posting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posting = new Posting;
        $posting->vender_id = $request->vender_id;
        $posting->number = $request->number;
        $posting->posted_at = $request->posted_at;
        $posting->save();
        return redirect('/posting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posting = Posting::find($id);
        return view('posting.show', ['posting' => $posting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posting = Posting::find($id);
        return view('posting.edit', ['posting' => $posting]);
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
        $posting = Posting::find($id);
        $posting->vender_id = $request->vender_id;
        $posting->number = $request->number;
        $posting->posted_at = $request->posted_at;
        $posting->save();
        return redirect("/posting/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posting = Posting::find($id);
        $posting->delete();
        return redirect('/posting');
    }
}
