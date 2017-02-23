@extends('layouts.app')
@section('jabatan')
    active
@endsection
@section('content')
<center><h1>Daftar Jabatan</h1></center>
<a  href="{{url('jabatan/create')}}" class="btn btn-success ">Tambah</a>
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
			<tr class ="bg-danger">
				<th>No</th>
				<th>Kode Jabatan</th>
				<th>Nama Jabatan</th>
				<th>Besar Uang</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($jabatan as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->kode_j}}</td>
				<td>{{$data->nama_j}}</td>
				<td>{{$data->besar_uang}}</td>
				<td>
					<a href="{{route('jabatan.edit',$data->id)}}" class='btn btn-danger'> Edit </a>
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE','route'=>['jabatan.destroy',$data->id]]) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	

@endsection