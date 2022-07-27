<?php

namespace App\Http\Controllers;

use App\Models\Plant_bd;
use App\Models\Plant_bd_dok;
use App\Models\PO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class POController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_tiket_po = Plant_bd_dok::select('id')->where('del', 1)->get();

        return view('po-harian.create', compact('id_tiket_po'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_tiket_po' => 'required',
            'dok_po' => 'required',
            'no_po' => 'required',
            'tgl_po' => 'required',
            'dealer_po' => 'required',
        ]);

        $record = PO::create([
            'id_tiket_po'   =>  $request->id_tiket_po,
            'no_po'   =>  $request->no_po,
            'dok_po'        =>  $request->dok_po,
            'tgl_po'        =>  $request->tgl_po,
            'dealer_po'     =>  $request->dealer_po,
            'del'           =>  1,
        ]);

        if($record){
            return redirect()->route('po-harian.show', $request->id_tiket_po)->with(['success' => 'Data Berhasil Ditambah!']);
        }
        else{
            return redirect()->route('po-harian.show', $request->id_tiket_po)->with(['error' => 'Data Gagal Ditambah!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PO::where('id_tiket_po', $id)->get();
        $dataDok = Plant_bd_dok::select('id_tiket','dok_no')->where('id', $data[0]->id_tiket_po)->get();
        $dataBD = Plant_bd::select('kodesite')->where('id', $dataDok[0]->id_tiket)->get();

        return view('po-harian.show', compact('data', 'dataDok', 'dataBD'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Data Utama
        $data = Plant_bd::findOrFail($id);
        $nom_unit = DB::table("plant_populasi")->select("Nom_unit")->get();
        $kode_bd = DB::table("kode_bd")->select("kode_bd")->get();
        $dok_type = DB::table("plant_status_bd_dok")->select(DB::raw("DISTINCT dok_type"))->get();
        $dok_tiket = DB::table("plant_status_bd_dok")->select(DB::raw("DISTINCT id_tiket"))->get();
        $site = DB::table('site')->select('kodesite', 'namasite', 'lokasi')->get();

        return view('bd-harian.edit', compact('nom_unit', 'kode_bd', 'dok_type', 'dok_tiket', 'site', 'data'));
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
        $request->validate([
            'nom_unit' => 'required',
            'tgl_bd' => 'required',
            'tgl_rfu' => 'required',
            'ket_tgl_rfu' => 'required',
            'kode_bd' => 'required',
            'pic' => 'required',
            'hm' => 'required',
            'site' => 'required',
        ]);

        $record = Plant_bd::findOrFail($id);

        $record->update([
            'nom_unit'          =>  $request->nom_unit,
            'tgl_bd'            =>  $request->tgl_bd,
            'tgl_rfu'           =>  $request->tgl_rfu,
            'ket_tgl_rfu'       =>  $request->ket_tgl_rfu,
            'kode_bd'           =>  $request->kode_bd,
            'pic'               =>  $request->pic,
            'hm'                =>  $request->hm,
            'kodesite'          =>  $request->site,
            'keterangan'        =>  "Testing",
            'status_bd'         =>  $request->kode_bd[1],
        ]);

        if($record){
            return redirect()->route('bd-harian.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }
        else{
            return redirect()->route('bd-harian.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $record = Plant_bd::findOrFail($id)->update([
            'del' =>  0,
        ]);

        if($record){
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil Dihapus'
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Data tidak berhasil Dihapus'
            ]);
        }
    }
}
