@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Buat Pembayaran</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            @if ($orders->isEmpty())
                <div class="alert alert-info">
                    Tidak ada pesanan yang tersedia untuk dibayar.
                </div>
            @else
                <form action="{{ route('customer.payments.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="order_id">Pilih Pesanan</label>
                        <select name="order_id" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Pesanan --</option>
                            @foreach ($orders as $order)
                                <option value="{{ $order->id }}">Pesanan #{{ $order->id }} ({{ $order->menu->nama }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <input type="text" name="metode_pembayaran" class="form-control" placeholder="Contoh: Transfer Bank" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" min="0" placeholder="Contoh: 15000" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
                    <a href="{{ route('customer.payments.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            @endif

        </div>
    </div>
</div>
@endsection
