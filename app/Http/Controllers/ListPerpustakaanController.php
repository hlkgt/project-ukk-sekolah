<?php

namespace App\Http\Controllers;

use App\Models\ListPerpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListPerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = ListPerpustakaan::all();
        return view('listperpustakaan', compact('lists'));
    }
    public function kembaliIndex()
    {
        $lists = ListPerpustakaan::all();
        return view('kembalikanbuku', compact('lists'));
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
     * @param  \App\Http\Requests\StoreListPerpustakaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('list_perpustakaans')->insert([
            "tanggal" => $request->tanggal,
            "nama" => $request->nama,
            "kelas" => $request->kelas,
            "buku_dipinjam" => $request->bukuDipinjam,
            "nama_penjaga" => $request->namaPenjaga,
            "status" => $request->status
        ]);

        return redirect()->back()->with(['success' => 'Data Peminjam Ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListPerpustakaan  $listPerpustakaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = ListPerpustakaan::where('id', '=', $id)->get();
        return response()->json($list);
    }
    public function kembaliShow($id)
    {
        $list = ListPerpustakaan::where('id', '=', $id)->get();
        return response()->json($list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListPerpustakaan  $listPerpustakaan
     * @return \Illuminate\Http\Response
     */
    public function edit(ListPerpustakaan $listPerpustakaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListPerpustakaanRequest  $request
     * @param  \App\Models\ListPerpustakaan  $listPerpustakaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListPerpustakaan $listPerpustakaan)
    {
        //
    }
    public function kembaliUpdate(Request $request)
    {
        $list = ListPerpustakaan::where('id', '=', $request->id)->first();
        $list->status = $request->status;
        $list->tanggal_dikembalikan = $request->tanggalPengembalian;
        $list->save();

        return redirect()->back()->with(['success' => 'Buku Telah Dikembalikan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListPerpustakaan  $listPerpustakaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListPerpustakaan $listPerpustakaan)
    {
        //
    }
}
