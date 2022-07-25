<?php

namespace App\Http\Controllers;

use App\Models\Plant_bd;
use App\Models\Plant_bd_desc;
use App\Models\Plant_bd_dok;
use App\Models\PlantStatusBD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BDHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('plant_status_bd')->select(DB::raw("
        plant_status_bd.*, 
        IFNULL(DATEDIFF(curdate(), plant_status_bd.tgl_bd),0) as day,
        site.namasite"))
        ->join('site', 'plant_status_bd.kodesite', '=', 'site.kodesite')
        ->orderBy('id')
        ->get();

        return view('bd-harian.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Data Utama
        $nom_unit = DB::table("plant_populasi")->select("Nom_unit")->get();
        $kode_bd = DB::table("kode_bd")->select("kode_bd")->get();
        $dok_type = DB::table("plant_status_bd_dok")->select(DB::raw("DISTINCT dok_type"))->get();
        $dok_tiket = DB::table("plant_status_bd_dok")->select(DB::raw("DISTINCT id_tiket"))->get();
        $site = DB::table('site')->select('kodesite', 'namasite', 'lokasi')->get();


        return view('bd-harian.create', compact('nom_unit', 'kode_bd', 'dok_type', 'dok_tiket', 'site'));
    }

    /**
     * Detail
     * 
     * Showing Detail Data
     */
    public function detail($id)
    {
        $data = DB::table('plant_status_bd')->select(DB::raw("
        plant_status_bd.*, 
        IFNULL(DATEDIFF(curdate(), plant_status_bd.tgl_bd),0) as day,
        site.namasite"))
        ->join('site', 'plant_status_bd.kodesite', '=', 'site.kodesite')
        ->where('plant_status_bd.id', '=', $id)
        ->orderBy('id')
        ->get();

        $nom_unit = DB::table('plant_status_bd')->select("nom_unit")->where('id', '=', $id)->get();

        $dataDok = DB::table('plant_status_bd')
        ->select('plant_status_bd_dok.id', 'plant_status_bd.nom_unit', 'plant_status_bd_dok.dok_type', 'plant_status_bd_dok.dok_no', 'plant_status_bd_dok.dok_tgl', 'plant_status_bd_dok.uraian_bd', 'plant_status_bd_dok.uraian', 'plant_status_bd_dok.keterangan')
        ->join('plant_status_bd_dok', 'plant_status_bd.id', '=', 'plant_status_bd_dok.id_tiket')
        ->where('plant_status_bd.id', '=', $id)
        ->get();

        if(count($dataDok) === 0){
            $dataDesc = "Data Kosong";
            $dataDok = "Data Kosong";
        }

        return view('bd-harian.detail', compact('dataDok', 'nom_unit', 'data'));
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
            'nom_unit' => 'required',
            'tgl_bd' => 'required',
            'tgl_rfu' => 'required',
            'ket_tgl_rfu' => 'required',
            'kode_bd' => 'required',
            'pic' => 'required',
            'hm' => 'required',
            'site' => 'required',
        ]);

        $record = Plant_bd::create([
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
            return redirect()->route('bd-harian.index');
        }
        else{
            return redirect()->route('bd-harian.index');
        }
    }

    public function storeBdDok(Request $request)
    {
        $request->validate([
            'id_tiket' => 'required',
            'dok_type' => 'required',
            'dok_no' => 'required',
            'dok_tgl' => 'required',
            'uraian' => 'required',
            'keterangan' => 'required',
        ]);

        $record = Plant_bd_dok::create([
            'id_tiket'              =>  $request->id_tiket,
            'dok_type'              =>  $request->dok_type,
            'dok_no'                =>  $request->dok_no,
            'dok_tgl'               =>  $request->dok_tgl,
            'uraian'                =>  $request->uraian,
            'keterangan'            =>  $request->keterangan,
        ]);

        if($record){
            return redirect()->route('bd-harian.index');
        }
        else{
            return redirect()->route('bd-harian.index');
        }
    }

    public function storeBdDesc(Request $request)
    {
        $request->validate([
            'id_tiket' => 'required',
            'uraian_bd' => 'required',
        ]);

        $record = Plant_bd_desc::create([
            'id_tiket'              =>  $request->id_tiket,
            'uraian_bd'              =>  $request->uraian_bd,
        ]);

        if($record){
            return redirect()->route('bd-harian.index');
        }
        else{
            return redirect()->route('bd-harian.index');
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

    public function editDetail($id)
    {
        // Data Utama
        $data = Plant_bd::findOrFail($id);
        $dok_type = DB::table("plant_status_bd_dok")->select(DB::raw("DISTINCT dok_type"))->get();
        $dok_tiket = DB::table("plant_status_bd_dok")->select(DB::raw("DISTINCT id_tiket"))->get();

        return view('bd-harian.edit-detail', compact('nom_unit', 'kode_bd', 'dok_type', 'dok_tiket', 'site', 'data'));
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
}
