@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Beri Ulasan</h1>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('customer.feedback.store') }}" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                <div class="form-group">
                    <label for="menu">Menu</label>
                    <input type="text" class="form-control" value="{{ $menu->nama_makanan }}" readonly>
                </div>

                <div class="form-group">
                    <label for="rating">Rating (1–5)</label>
                    <select name="rating" id="rating" class="form-control" required>
                        <option value="">Pilih rating</option>
                        <option value="1">1 - Sangat Buruk</option>
                        <option value="2">2 - Buruk</option>
                        <option value="3">3 - Cukup</option>
                        <option value="4">4 - Baik</option>
                        <option value="5">5 - Sangat Baik</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="komentar">Komentar</label>
                    <textarea name="komentar" id="komentar" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Kirim Ulasan</button>
            </form>

        </div>
    </div>
@endsection
