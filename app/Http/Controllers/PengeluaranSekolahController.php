<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengeluaranSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaransekolah = PengeluaranSekolah::all();

        return view('pengeluaransekolah', compact('pengeluaransekolah'));
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
     * @param  \App\Http\Requests\StorePengeluaranSekolahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('pengeluaran_sekolahs')->insert([
            "tanggal" => $request->tanggal,
            "unit" => $request->unit,
            "total" => $request->total,
            "penanggung_jawab" => $request->penanggung_jawab,
        ]);

        return redirect()->back()->with(['success' => 'Pengeluaran Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengeluaranSekolah  $pengeluaranSekolah
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaranSekolah = PengeluaranSekolah::where('id', '=', $id)->get();
        return response()->json($pengeluaranSekolah);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengeluaranSekolah  $pengeluaranSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(PengeluaranSekolah $pengeluaranSekolah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengeluaranSekolahRequest  $request
     * @param  \App\Models\PengeluaranSekolah  $pengeluaranSekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ps = PengeluaranSekolah::where('id', '=', $request->id)->first();
        $ps->tanggal = $request->tanggal;
        $ps->unit = $request->unit;
        $ps->total = $request->total;
        $ps->penanggung_jawab = $request->penanggung_jawab;
        $ps->save();

        return redirect()->back()->with(["success" => "update pengeluaran berhasil"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengeluaranSekolah  $pengeluaranSekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PengeluaranSekolah::where('id', '=', $id)->delete($id);
    }
}
