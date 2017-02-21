@extends('layouts.app')
@section('golongan')
	active
@endsection
@section('content')

<center><h1>Daftar Golongan</h1></center>
<a  href="{{url('golongan/create')}}" class="btn btn-warning form-control">Tambah</a>
<table border="1" class="table table-striped table-bordered table-hover">
		<thead>
			<tr class ="bg-warning">
				<th>No</th>
				<th>Kode Golongan</th>
				<th>Nama Golongan</th>
				<th>Besar Uang</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($golongan as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->kode_g}}</td>
				<td>{{$data->nama_g}}</td>
				<td>{{$data->besar_uang}}</td>
				<td>
					<a href="{{route('golongan.edit',$data->id)}}" class='btn btn-danger'> Edit </a>
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE','route'=>['golongan.destroy',$data->id]]) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-success']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	

@endsection