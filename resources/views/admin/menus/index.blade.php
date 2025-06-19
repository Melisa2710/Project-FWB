@extends('layouts.app') {{-- atau layouts.app tergantung SB Admin kamu pakai yang mana --}}

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Menu</h1>

    <div class="mb-3 text-right">
        <a href="{{ route('admin.menus.create') }}" class="btn btn-primary btn-sm">
            + Tambah Menu
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Makanan</th>
                            <th>Harga</th>
                            <th>Dibuat Pada</th>
                            <th>Diperbarui Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->nama_makanan }}</td>
                                <td>Rp{{ number_format($menu->harga, 0, ',', '.') }}</td>
                                <td>{{ $menu->created_at }}</td>
                                <td>{{ $menu->updated_at }}</td>
                                <td>
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
