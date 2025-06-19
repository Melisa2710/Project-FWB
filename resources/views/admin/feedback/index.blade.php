@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Kelola Feedback</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Menu</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $index => $feedback)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $feedback->user->name ?? 'User tidak ditemukan' }}</td>
                                <td>{{ $feedback->menu->nama_makanan ?? 'Menu tidak ditemukan' }}</td>
                                <td>{{ $feedback->rating ?? '-' }}</td>
                                <td>{{ $feedback->komentar }}</td>
                                <td>{{ \Carbon\Carbon::parse($feedback->created_at)->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
