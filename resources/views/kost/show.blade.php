@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <h2>{{$kost->nama_kost}}</h2>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header text-center">
                    Data Kost
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">
                        Foto-foto
                    </h4>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="http://liforco.dev/storage/image/kost/countryside-6343_1518477536.jpg" alt="First slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <hr>
                    <h4 class="card-title">
                        <a href="/fasilitas/{{$kost->id}}">Fasilitas Kost</a>
                    </h4>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
