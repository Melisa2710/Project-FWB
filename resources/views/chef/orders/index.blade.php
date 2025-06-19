@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Pesanan Masuk</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $i => $order)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->menu->nama_makanan ?? 'Menu tidak ditemukan' }}</td>
                            <td>{{ $order->jumlah }}</td>
                            <td>
                                @if ($order->status === 'pending')
                                    <span class="badge badge-warning">Menunggu</span>
                                @elseif ($order->status === 'proses')
                                    <span class="badge badge-primary">Diproses</span>
                                @elseif ($order->status === 'selesai')
                                    <span class="badge badge-success">Selesai</span>
                                @endif
                            </td>
                            <td>
                                @if ($order->status === 'pending')
                                <form action="{{ route('chef.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-success">Proses</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
