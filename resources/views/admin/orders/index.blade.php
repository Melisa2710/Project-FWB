@extends('layouts.app')

@section('content')
<h1>Kelola Pesanan</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $index => $order)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->menu->nama_makanan }}</td>
            <td>{{ $order->jumlah }}</td>
            <td>{{ ucfirst($order->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
