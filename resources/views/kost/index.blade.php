@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <h2>Kost yang anda miliki <a href="/kost/create" class="btn btn-outline-success float-right">Tambah Baru</a></h2>
    <div class="row">
        @foreach($kosts as $kost)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <a class="btn btn-outline-primary float-left" href="/kost/{{$kost->id}}/edit">Edit</a>
                    <form method="POST" action="{{ route('kost.destroy', $kost->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <input type="submit" class="btn btn-outline-danger float-right" value="Hapus">
                    </form>
                </div>
                <a href="/kost/{{$kost->id}}"><img class="card-img-top" src="/storage/image/kost/{{$kost->photo}}" alt="Card image cap"></a>
                <div class="card-body text-center">
                    <h4 class="card-title">{{$kost->nama_kost}}</h2>
                    <hr>
                    <h5 class="card-title">Deskripsi Kost</h3>
                    {{$kost->deskripsi}}
                    <br/>
                    <hr>
                    <h5 class="card-title">Alamat Lengkap</h3>
                    {{$kost->alamat_lengkap}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
