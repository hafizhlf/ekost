@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <h2>{{$kost->nama_kost}}</h2>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header text-center">
                    Informasi Kost
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">
                        Zona Lokasi Kost
                    </h4>
                    <p class="card-text">
                        Hello
                    </p>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">
                        Gallery
                    </h4>
                    <p class="card-text">
                        <div class="btn-group" role="group">
                            <a href="/kost/gallery/{{ $kost->id }}" class="form-control btn btn-outline-secondary">Lihat Gallery</a>
                            <a href="/kost/addimg/{{ $kost->id }}" class="form-control btn btn-outline-secondary">Tambah Gallery</a>
                        </div>
                    </p>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">
                        Fitur Kost
                    </h4>
                    <p class="card-text">
                        <table class="table table-hover">
                            <tr>
                                <?php $i = 1; ?>
                                @foreach ($fasilitas as $dfas)
                                    <td width="240">
                                        <input type="checkbox" class="form-check-input" id="fasilitas{{ $i }}">
                                        <label for="fasilitas{{ $i }}" class="form-check-label">
                                            <img src="/storage/image/icon/{{ $dfas->icon }}" width="35">
                                            {{ $dfas->nama_fasilitas }}
                                        </label>
                                    </td>
                                    @if ($i % 2 == 0)
                                        </tr>
                                        <tr>
                                    @endif
                                    <?php $i++ ?>
                                @endforeach
                            </tr>
                        </table>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header text-center">
                    Harga Kost
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">
                        @if(!empty($harga))
                        <ul class="list-group">
                            <li class="list-group-item">Rp. {{number_format($harga->hari)}} / hari</li>
                            <li class="list-group-item">Rp. {{number_format($harga->minggu)}} / minggu</li>
                            <li class="list-group-item">Rp. {{number_format($harga->bulan)}} / bulan</li>
                        </ul>
                        @else
                        Harga belum di masukkan
                        @endif
                    </h4>
                    <p class="card-text">
                        <a href="#" class="form-control btn btn-outline-secondary">Isi harga</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
