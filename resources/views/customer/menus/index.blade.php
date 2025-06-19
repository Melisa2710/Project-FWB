@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Daftar Menu</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Tambah Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->nama_makanan }}</td>
                        <td>Rp{{ number_format($menu->harga, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('customer.orders.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                <input type="number" name="jumlah" value="1" min="1" class="form-control">
                                <button type="submit" class="btn btn-primary">Pesan</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
