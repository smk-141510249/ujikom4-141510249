@extends('layouts.app')
@section('content')
<h1>Edit Tunjangan Pegawai</h1>
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">Edit Tunjangan Pegawai</div>
                <div class="panel-body">
					{!! Form::model($tunjanganp,['method'=>'PATCH','route'=>['tunjanganp.update',$tunjanganp->id]])!!}
						{!! Form::hidden('id',null,['class'=>'form-control']) !!}
                        <div class="form-group{{ $errors->has('kode_tunjangan_id') ? ' has-error' : '' }}">
                            <label for="kode_tunjangan_id" class="col-md-4 control-label">Kode Tunjangan id</label>

                            <div class="col-md-6">
                                {!! Form::text('kode_tunjangan_id',null,['class'=>'form-control']) !!}
                                @if ($errors->has('kode_tunjangan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
                            <label for="pegawai_id" class="col-md-4 control-label">pegawai id</label>

                            <div class="col-md-6">
                                <select name="pegawai_id" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach($pegawai as $data)
                                    <option value="{{$data->id}}">{{$data->pegawai_id}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('pegawai_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
						{!! Form::submit('Save',['class'=>'btn btn-danger form-control']) !!}
					</div>
				{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection