@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <h2>Kost yang anda miliki</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">User </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kost</th>
                                <th scope="col">Deskripsi Kost</th>
                                <th scope="col" colspan="4"><a href="/kost/create" class="btn btn-outline-success btn-sm">Kost Baru</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kosts as $kost)
                            <tr>
                                <th scope="row">{{ ( $kosts->currentPage() - 1 ) * $kosts->perPage() + $loop->iteration }}</th>
                                <td>{{ $kost->nama_kost }}</td>
                                <td>{{ $kost->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('kost.show', $kost->id) }}" class="form-control btn btn-outline-secondary btn-sm">Informasi Kost</a>
                                </td>
                                <td>
                                    <a href="/kost/gallery/{{ $kost->id }}" class="form-control btn btn-outline-secondary btn-sm">Gallery</a>
                                </td>
                                <td>
                                    <a href="/kost/{{ $kost->id }}/edit/" class="form-control btn btn-outline-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('kost.destroy', $kost->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="submit" class="form-control btn btn-outline-danger btn-sm" value="Hapus">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $kosts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
