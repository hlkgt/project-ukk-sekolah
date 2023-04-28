<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $absensis = Absensi::all();

        return view('absensiswa', compact('user', 'absensis'));
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
     * @param  \App\Http\Requests\StoreAbsensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Absensi::create([
            "tanggal" => $request->tanggal,
            "nama_siswa" => $request->nama,
            "kelas" => $request->kelas,
            "no_absen" => $request->noAbsen,
            "deskripsi" => $request->deskripsi,
        ]);

        return redirect()->back()->with(['success' => "Absen Berhasil Ditambahkan"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absensi = Absensi::where('id', '=', $id)->get();
        return response()->json($absensi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbsensiRequest  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $absensi = Absensi::where('id', '=', $request->id)->first();
        $absensi->tanggal = $request->tanggal;
        $absensi->nama_siswa = $request->nama;
        $absensi->kelas = $request->kelas;
        $absensi->no_absen = $request->noAbsen;
        $absensi->deskripsi = $request->deskripsi;
        $absensi->save();

        return redirect()->back()->with(['success' => 'Absensi Telah Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absensi::where('id', '=', $id)->delete($id);
    }
}
