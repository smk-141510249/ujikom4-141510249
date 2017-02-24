<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\Penggajian;
use App\Tunjangan_pegawai;
use App\Pegawai;
use App\Tunjangan;
use App\Lembur_pegawai;
use App\Kategori_lembur;
use App\Golongan;
use App\Jabatan;
use auth ;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware ('Keuangan');
    }
    public function index()
    {
        $penggajian=Penggajian::all();
        $pegawai=Pegawai::all();
        $lemburp=Lembur_pegawai::all();
        $tunjangan=Tunjangan_pegawai::all();
        return view('penggajian.index',compact('penggajian','pegawai','lemburp','tunjangan'));
         /*$lemburp+Lembur_pegawai::all();
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        $penggajian=Penggajian::paginate(3);
        return view('penggajian.index',compact('penggajian','pegawai','tunjangan','lemburp'));
    }


     public function search(Request $request)
    {
        $query = Request::get('q');
        $pegawai = Pegawai::where('id', 'LIKE', '%' . $query . '%')->paginate(10);
        $pegawaii = Pegawai::all();
        $penggajian=Penggajian::all();
         $lemburp=Lembur_pegawai::all();
        $tunjangan=Tunjangan_pegawai::all();
        return view('penggajian.result', compact('penggajian','pegawai','pegawaii','lemburp','tunjangan', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
    public function create()
    {
        //return view('penggajian.create');
        $gaji=Tunjangan_pegawai::paginate(10);
        return view('penggajian.create',compact('gaji'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i_gaji=Input::all();
        $tunjangan_pegawai=Tunjangan_pegawai::where('id',$i_gaji['tunjangan_pegawai_id'])->first();
        $WPenggajian=Penggajian::where('tunjangan_pegawai_id',$tunjangan_pegawai->id)->first();
        $tunjangan=Tunjangan::where('id',$tunjangan_pegawai->kode_tunjangan_id)->first();
        $pegawai=Pegawai::where('id',$tunjangan_pegawai->pegawai_id)->first();
        $kategori_lembur=Kategori_lembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        $lembur_pegawai=Lembur_pegawai::where('pegawai_id',$pegawai->id)->first();
        $jabatan=Jabatan::where('id',$pegawai->jabatan_id)->first();
        $golongan=Golongan::where('id',$pegawai->golongan_id)->first();
       

       $gaji = new Penggajian ;

       if (isset($WPenggajian)) {
           $error=true ;
           $tunjangan=Tunjangan_pegawai::paginate(10);
           return view('penggajian.create',compact('tunjangan','error'));
       }
       elseif (!isset($lembur_pegawai)) {
            $nol = 0;
            $gaji->jumlah_jam_lembur= $nol;
            $gaji->jumlah_uang_lembur = $nol;
            $gaji->gaji_pokok=$jabatan->besar_uang+$golongan->besar_uang;
            $gaji->total_gaji=($tunjangan->jumlah_anak*$tunjangan->besar_uang)+($jabatan->besar_uang+$golongan->besar_uang);
            $gaji->tanggal_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        elseif(!isset($lembur_pegawai) || !isset($kategori_lembur))
        {
            $nol = 0;
            $gaji->jumlah_jam_lembur= $nol;
            $gaji->jumlah_uang_lembur = $nol;
            $gaji->gaji_pokok=$jabatan->besar_uang+$golongan->besar_uang;
            $gaji->total_gaji = ($tunjangan->jumlah_anak*$tunjangan->besar_uang)+($jabatan->besar_uang+$golongan->besar_uang);
            $gaji->tanggal_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        else
        {
            $gaji->jumlah_jam_lembur=$lembur_pegawai->Jumlah_jam;
            $gaji->jumlah_uang_lembur =($lembur_pegawai->Jumlah_jam)*($kategori_lembur->besar_uang);
            $gaji->gaji_pokok=$jabatan->besar_uang+$golongan->besar_uang;
            $gaji->total_gaji = ($lembur_pegawai->Jumlah_jam*$kategori_lembur->besar_uang)+($tunjangan->jumlah_anak*$tunjangan->besar_uang)+($jabatan->besar_uang+$golongan->besar_uang);
            $gaji->tanggal_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        return redirect('gajian');
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
         Penggajian::find($id)->delete();
        return redirect('gajian');
    }
}
