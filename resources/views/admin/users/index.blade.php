@extends('layouts.app')

@section('content')
<h1>Kelola Pengguna</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $index => $user)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
