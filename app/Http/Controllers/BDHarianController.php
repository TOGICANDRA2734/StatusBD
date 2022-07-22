<?php

namespace App\Http\Controllers;

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
        IFNULL(DATEDIFF(plant_status_bd.tgl_rfu, plant_status_bd.tgl_bd),0) as day,
        site.namasite"))
        ->join('site', 'plant_status_bd.kodesite', '=', 'site.kodesite')
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


        return view('bd-harian.create', compact('nom_unit', 'kode_bd', 'dok_type'));
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

    public function storeBdDok(Request $request)
    {
        //
    }

    public function storeBdDesc(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('plant_status_bd')
        ->select('plant_status_bd.nom_unit', 'plant_status_bd_dok.dok_type', 'plant_status_bd_dok.dok_no', 'plant_status_bd_dok.dok_tgl', 'plant_status_bd_dok.uraian', 'plant_status_bd_dok.keterangan')
        ->join('plant_status_bd_dok', 'plant_status_bd.id', '=', 'plant_status_bd_dok.id_tiket')
        ->where('plant_status_bd.id', '=', $id)
        ->get();
        return view('bd-harian.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
