@extends('layouts.appp')
@section('penggajian')
    active
@endsection
@section('content')
<h1><center>INFORMASI GAJI</center></h1>
<hr></hr>
     <table class="table table-striped table-hover table-bordered">
                        
                        <div class="col-md-12">
                        <center>
                        

                        <h3>Nama:{{$penggajian->Tunjangan_pegawai->Pegawai->User->name}}</h3>
                        <h3>NIP:{{$penggajian->Tunjangan_pegawai->Pegawai->nip}}</h3>
                        <h3>Status Gaji:</h3><b>@if($penggajian->tanggal_pengambilan == ""&&$penggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @elseif($penggajian->tanggal_pengambilan == ""||$penggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @else
                            Gaji Sudah Diambil Pada {{$penggajian->tanggal_pengambilan}}
                        @endif</b>
                        <br>
                        <br>
                        <h5>Gaji Lembur Sebesar Rp.{{$penggajian->jumlah_uang_lembur}} ,Gaji Pokok Sebesar Rp.{{$penggajian->gaji_pokok}} ,Mendapat Tunjangan Sebesar Rp.{{$penggajian->Tunjangan_pegawai->Tunjangan->besar_uang}} ,Jadi Total Gaji Rp.{{$penggajian->total_gaji}}



                        </h5>
                        
                                <a class="btn btn-success col-md-12" href="{{url('penggajian')}}">Kembali</a>
                                
                        </center>
                        </div> 
                        
                    </table>

@endsection