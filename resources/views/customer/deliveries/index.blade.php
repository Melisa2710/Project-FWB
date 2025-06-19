@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Lacak Pengiriman</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Pesanan</th>
                        <th>Status Pengiriman</th>
                        <th>waktu pengiriman</th>
                        <th>alamat</th>
                        <th>kurir</th>
                        <th>Kode Resi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deliveries as $index => $delivery)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>#{{ $delivery->order_id }}</td>
                            <td>{{ $delivery->status_pengiriman }}</td>
                            <td>{{ $delivery->waktu_pengiriman }}</td>
                            <td>{{ $delivery->alamat }}</td>
                            <td>{{ $delivery->kurir }}</td>
                            <td>{{ $delivery->kode_resi ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
