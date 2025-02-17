<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBiodataRequest;
use App\Http\Requests\UpdateBiodataRequest;
use App\Models\Biodata;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biodata = Biodata::all();
        return view("biodata.list")->with("biodatas", $biodata);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("biodata.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBiodataRequest $request)
    {
        $biodata = new Biodata();
        $biodata->nama_lengkap = $request->input('nama_lengkap');
        $biodata->nik = $request->input('nik');
        $biodata->umur = $request->input('umur');
        $biodata->alamat = $request->input('alamat');
        $biodata->created_at = now();
        $biodata->save();

        return redirect()->route('biodata.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Biodata $biodata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $biodata = Biodata::findorfail($id);

        return view("biodata.edit")->with("biodata", $biodata);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBiodataRequest $request, int $id)
    {
        $biodata = Biodata::findorfail($id);
        $biodata->nama_lengkap = $request->input('nama_lengkap');
        $biodata->nik = $request->input('nik');
        $biodata->umur = $request->input('umur');
        $biodata->alamat = $request->input('alamat');
        $biodata->created_at = now();
        $biodata->save();

        return redirect()->route('biodata.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Biodata::findorfail($id)->delete();

        return redirect()->route('biodata.index');
    }
}
