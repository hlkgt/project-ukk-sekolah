<?php

namespace App\Http\Controllers;

use App\Models\BayarBulanan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BayarBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('bayarbulanan', compact('users'));
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
     * @param  \App\Http\Requests\StoreBayarBulananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BayarBulanan  $bayarBulanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = User::where('id', $id)->get();
        $tagihan = BayarBulanan::where('user_id', $id)->get();
        return view('tampiltagihan', compact('siswa', 'tagihan'));
    }

    public function showValue($id)
    {
        $tagihan = BayarBulanan::where('id', $id)->get();
        return response()->json($tagihan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BayarBulanan  $bayarBulanan
     * @return \Illuminate\Http\Response
     */
    public function edit(BayarBulanan $bayarBulanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBayarBulananRequest  $request
     * @param  \App\Models\BayarBulanan  $bayarBulanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bayar = BayarBulanan::where('id', '=', $request->id)->first();
        $bayar->bulan = $request->bulan;
        $bayar->tahun = $request->tahun;
        $bayar->status_pembayaran = $request->status;
        $bayar->total_tagihan = $request->tagihan;
        $bayar->save();

        return redirect()->back()->with(['success' => "Pembayaran Berhasil"]);
    }

    public function cancel(Request $request)
    {
        $bayar = BayarBulanan::where('id', '=', $request->id)->first();
        $bayar->bulan = $request->bulan;
        $bayar->tahun = $request->tahun;
        $bayar->status_pembayaran = $request->status;
        $bayar->total_tagihan = $request->tagihan;
        $bayar->save();

        return redirect()->back()->with(['success' => "Pembayaran Dibatalkan"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BayarBulanan  $bayarBulanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(BayarBulanan $bayarBulanan)
    {
        //
    }
}
