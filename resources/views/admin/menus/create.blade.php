@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Tambah Menu Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_makanan">Nama Makanan</label>
                <input type="text" name="nama_makanan" class="form-control" placeholder="Masukkan nama makanan"
                    value="{{ old('nama_makanan') }}">
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukkan harga"
                    value="{{ old('harga') }}">
            </div>

            <div class="form-group">
                <label for="gambar">Upload Gambar</label>
                <input type="file" name="gambar" class="form-control-file" accept="image/" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
