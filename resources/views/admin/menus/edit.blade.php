@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Edit Menu</h1>

        <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_makanan">Nama Makanan</label>
                <input type="text" name="nama_makanan" class="form-control" value="{{ $menu->nama_makanan }}" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $menu->harga }}" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
