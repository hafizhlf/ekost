@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
    <div class="row">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">User </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hak Akses</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ ( $users->currentPage() - 1 ) * $users->perPage() + $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.updateRole', $user->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <input type="submit" class="form-control btn btn-outline-secondary btn-sm" value="{{ $user->role }}">
                                    </form>
                                </td>
                                <td>
                                    <a href="/admin/{{ $user->id }}/editUser/" class="form-control btn btn-outline-success btn-sm float-right">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.deleteUser', $user->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="submit" class="form-control btn btn-outline-danger btn-sm float-left" value="Hapus">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->appends(['fasilitas' => $fasilitas->currentPage()])->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">Fasilitas</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">icon</th>
                                <th scope="col"><a href="/admin/create/fasilitas" class="form-control btn btn-outline-secondary btn-sm">Baru</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fasilitas as $dfas)
                            <tr>
                                <th scope="row">{{ ( $fasilitas->currentPage() - 1 ) * $fasilitas->perPage() + $loop->iteration }}</th>
                                <td>{{ $dfas->nama_fasilitas }}</td>
                                <td><img src="/storage/image/icon/{{ $dfas->icon }}" width="40"></td>
                                <td>
                                    <form method="POST" action="{{ route('delete.fasilitas', $dfas->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="submit" class="form-control btn btn-outline-danger btn-sm float-left" value="Hapus">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $fasilitas->appends(['users' => $users->currentPage()])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
