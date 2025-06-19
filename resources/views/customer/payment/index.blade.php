@extends('layouts.app')

@section('content')
    <h1>Pembayaran Saya</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Pesanan</th>
                <th>Jumlah</th>
                <th>Metode</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $pay)
                <tr>
                    <td>{{ $pay->order_id }}</td>
                    <td>{{ $pay->jumlah }}</td>
                    <td>{{ $pay->metode_pembayaran }}</td>
                    <td>{{ $pay->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
