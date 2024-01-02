<?php

namespace App\Http\Controllers;

use App\Models\itemM;
use App\Models\keteranganM;
use App\Models\satuanM;
use App\Models\itemhabisM;
use App\Models\itemexpiredM;
use Illuminate\Http\Request;

class itemC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = empty($request->keyword)?'':$request->keyword;
        $keterangan = empty($request->keterangan)?1:$request->keterangan;

        $dataketerangan = keteranganM::get();
        $datasatuan = satuanM::get();

        $data = itemM::where("idketerangan", $keterangan)
        ->where("namaitem", "like", "%$keyword%")
        ->paginate(15);

        $data->appends($request->all());

        return view("pages.data", [
            "keyword" => $keyword,
            "keterangan" => $keterangan,
            "data" => $data,
            "dataketerangan" => $dataketerangan,
            "datasatuan" => $datasatuan,
        ]);
        

    }

    public function keluar(Request $request)
    {
        $keyword = empty($request->keyword)?'':$request->keyword;
        $keterangan = empty($request->keterangan)?1:$request->keterangan;

        $dataketerangan = keteranganM::get();
        $datasatuan = satuanM::get();

        $data = itemM::where("idketerangan", $keterangan)
        ->where("namaitem", "like", "%$keyword%")
        ->paginate(15);

        $data->appends($request->all());

        return view("pages.datakeluar", [
            "keyword" => $keyword,
            "keterangan" => $keterangan,
            "data" => $data,
            "dataketerangan" => $dataketerangan,
            "datasatuan" => $datasatuan,
        ]);
        

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->all();
            $data["idketerangan"] = 1;

            itemM::create($data);
            return redirect()->back()->with('toast_success', 'Success');

        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    public function ubahstok(Request $request, $iditem)
    {
        // try{
            $data = $request->all();

            $item = itemM::where("iditem", $iditem)->first();
            $stokAwal = $item->stok; 
            $stokAkhir = $request->stok;
            $hasil = $stokAwal - $stokAkhir;
            
            if($hasil < 0 ) {
                return redirect()->back()->with('error', 'Maaf stok tidak sesuai');
            }

            $keterangan = (int)$request->idketerangan;
            
            if($keterangan == 2) {
                itemhabisM::create($data);
            }elseif($keterangan == 3) {
                itemexpiredM::create($data);
            }

            return redirect()->back()->with('success', 'Data berhasil dipindahkan');
        // }catch(\Throwable $th){
        //     return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        // }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\itemM  $itemM
     * @return \Illuminate\Http\Response
     */
    public function show(itemM $itemM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\itemM  $itemM
     * @return \Illuminate\Http\Response
     */
    public function edit(itemM $itemM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\itemM  $itemM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, itemM $itemM, $iditem)
    {
        try{
            $data = $request->all();
            $data["idketerangan"] = 1;
            itemM::where("iditem", $iditem)->first()->update($data);

            return redirect()->back()->with('toast_success', 'Success');

        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\itemM  $itemM
     * @return \Illuminate\Http\Response
     */
    public function destroy(itemM $itemM, $iditem)
    {
        try{
            itemM::destroy($iditem);
            return redirect()->back()->with('toast_success', 'Success');
        }catch(\Throwable $th){
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan');
        }
    }
}
