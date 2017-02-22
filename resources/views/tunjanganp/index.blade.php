@extends('layouts.app')
@section('content')
<center><h1>Daftar Tunjangan Pegawai</h1></center>
<a  href="{{url('tunjanganp/create')}}" class="btn btn-danger form-control">Tambah</a>
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
			<tr class ="bg-danger">
				<th>No</th>
				<th>Kode Kategori Tunjangan</th>
				<th>Nama Pegawai</th>
				
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($tunjanganp as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->kode_tunjangan_id}}</td>
				<td>{{$data->pegawai->user->name}}</td>
				<td>
				<a href="{{route('tunjanganp.edit',$data->id)}}" class='btn btn-danger'> Edit </a>
				</td>

				<td>
					{!! Form::open(['method'=>'DELETE','route'=>['tunjanganp.destroy',$data->id]]) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
	

@endsection