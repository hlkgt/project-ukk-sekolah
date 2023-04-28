<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use Illuminate\Http\Request;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataguru = DataGuru::all();
        return view('dataguru', compact('dataguru'));
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
     * @param  \App\Http\Requests\StoreDataGuruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataGuru = DataGuru::create([
            "nip" => $request->nip,
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "mapel" => $request->mapel,
            "kode_guru" => $request->kodeGuru,
        ]);

        return redirect()->back()->with(['success' => "Data Berhasil Ditambah"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataGuru  $dataGuru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataguru = DataGuru::where('id', '=', $id)->get();
        return response()->json($dataguru);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataGuru  $dataGuru
     * @return \Illuminate\Http\Response
     */
    public function edit(DataGuru $dataGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataGuruRequest  $request
     * @param  \App\Models\DataGuru  $dataGuru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ps = DataGuru::where('id', '=', $request->id)->first();
        $ps->nip = $request->nip;
        $ps->nama = $request->nama;
        $ps->alamat = $request->alamat;
        $ps->mapel = $request->mapel;
        $ps->kode_guru = $request->kodeGuru;
        $ps->save();
        return redirect()->back()->with(["success" => "Update Data Berhasil"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataGuru  $dataGuru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataguru = DataGuru::where('id', '=', $id)->delete($id);
    }
}
