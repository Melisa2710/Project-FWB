@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Kelola Pembayaran</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Nomor Pesanan</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $index => $payment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->user->name ?? '-' }}</td>
                    <td>{{ $payment->order->id ?? '-' }}</td>
                    <td>Rp{{ number_format($payment->amount) }}</td>
                    <td>{{ $payment->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
