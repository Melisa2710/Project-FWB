@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2>Menu Tersedia</h2>
    <div class="row">
        @foreach ($menus as $menu)
        <div class="col-md-4 mb-4">
            <div class="card h-100">

                {{-- Gambar diambil dari storage yang disimpan di database --}}
                <img src="{{ asset('storage/' . $menu->gambar) }}"
                     alt="{{ $menu->nama_makanan }}"
                     onerror="this.src='{{ asset('images/default.jpg') }}';"
                     class="card-img-top"
                     style="height: 200px; object-fit: cover; display: block; margin: 0 auto;">

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $menu->nama_makanan }}</h5>
                    <p class="card-text">Harga: Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
