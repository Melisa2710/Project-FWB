@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Kelola Pengiriman</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>ID Pesanan</th>
                    <th>Alamat Pengiriman</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveries as $index => $delivery)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $delivery->order->id ?? '-' }}</td>
                    <td>{{ $delivery->address }}</td>
                    <td>{{ $delivery->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
