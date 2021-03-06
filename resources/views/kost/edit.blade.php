@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Edit Data Kost</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kost.update', $kost->id) }}" enctype="multipart/form-data">
                        @csrf

                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Kost</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $kost->nama_kost }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">Deskripsi</label>

                            <div class="col-md-6">
                                <textarea id="desc" class="form-control{{ $errors->has('desc') ? ' is-invalid' : '' }}" name="desc" required>{{ $kost->deskripsi }}</textarea>

                                @if ($errors->has('desc'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="addr" class="col-md-4 col-form-label text-md-right">Alamat Lengkap</label>

                            <div class="col-md-6">
                                <input id="addr" type="text" class="form-control{{ $errors->has('addr') ? ' is-invalid' : '' }}" name="addr" value="{{ $kost->alamat_lengkap }}" required>

                                @if ($errors->has('addr'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('addr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kode_pos" class="col-md-4 col-form-label text-md-right">Kode Pos</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('addr') ? ' is-invalid' : '' }}" id="kode_pos" name="kode_pos">
                                    @foreach ($kode_pos as $dkode)
                                        <option value="{{ $dkode->id }}" @if ($dkode->id == $kost->kode_pos)
                                            selected="selected"
                                        @endif>{{ $dkode->kode_pos }} - {{ $dkode->kelurahan }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('kode_pos'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('kode_pos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pict" class="col-md-4 col-form-label text-md-right">Gambar Sampul</label>

                            <div class="col-md-6">
                                    <img id="pict" src="/storage/image/kost/{{$kost->photo}}" alt="{{ $kost->nama_kost }}" class="img-thumbnail">
                                <input id="pict" type="file" class="form-control{{ $errors->has('pict') ? ' is-invalid' : '' }}" name="pict">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
