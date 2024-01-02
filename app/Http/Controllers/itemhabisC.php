<?php

namespace App\Http\Controllers;

use App\Models\itemhabisM;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class itemhabisC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = empty($request->keyword)?'':$request->keyword;

        $data = itemhabisM::whereHas("item", function ($query) use ($keyword){
            $query->where("namaitem", "like", "%$keyword%");
        })->orderBy("tanggal", "desc")
        ->paginate(15);
        $data->appends($request->all());

        return view("pages.habis", [
            "data" => $data,
            "keyword" => $keyword,
        ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak(Request $request)
    {
        $tanggalawal = Carbon::parse($request->tanggalawal);
        $tanggalakhir = Carbon::parse($request->tanggalakhir);

        $data = itemhabisM::whereBetween("tanggal", [$tanggalawal, $tanggalakhir])
        ->select("itemhabis.*")
        ->selectRaw("stok * hargaitem as total")
        ->orderBy("tanggal", "asc")
        ->get();

        $pdf = PDF::loadView("pages.laporan.pendapatan",[
            "data" => $data,
            "tanggalawal" => $tanggalawal,
            "tanggalakhir" => $tanggalakhir,
        ]);

        return $pdf->stream("pendapatan.pdf");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\itemhabisM  $itemhabisM
     * @return \Illuminate\Http\Response
     */
    public function show(itemhabisM $itemhabisM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\itemhabisM  $itemhabisM
     * @return \Illuminate\Http\Response
     */
    public function edit(itemhabisM $itemhabisM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\itemhabisM  $itemhabisM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, itemhabisM $itemhabisM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\itemhabisM  $itemhabisM
     * @return \Illuminate\Http\Response
     */
    public function destroy(itemhabisM $itemhabisM)
    {
        //
    }
}
