@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Pesanan Saya</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Makanan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Waktu Pesan</th>
                        <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->menu->nama_makanan }}</td>
                            <td>{{ $order->jumlah }} porsi</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @if (!$order->feedback)
                                    <a href="{{ route('customer.feedback.create', ['order_id' => $order->id]) }}"
                                        class="btn btn-primary btn-sm">
                                        Beri Ulasan
                                    </a>
                                @else
                                    <span class="text-success">Sudah Diulas</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
