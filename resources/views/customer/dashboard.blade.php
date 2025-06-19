@extends('layouts.app')

@section('content')

@php use Illuminate\Support\Str; @endphp 

<div class="container mt-4">
    <h2>Menu Tersedia</h2>
    <div class="row">
        @foreach ($menus as $menu)
        <div class="col-md-4 mb-4">
            <div class="card h-100">

                {{--  Gambar otomatis berdasarkan nama menu --}}
                @php
                    $slug = Str::slug($menu->nama_makanan); 
                @endphp

                <img src="{{ asset('storage/menu/' . $slug . 'mie-goreng.jpg') }}"
                     alt="{{ $menu->nama_makanan }}"
                     onerror="this.src='{{ asset('storage/menu/default.jpg') }}';"
                     class="card-img-top"
                     style="height: 200px; object-fit: cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $menu->nama_makanan }}</h5>
                    <p class="card-text">gambar doang ini.</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
