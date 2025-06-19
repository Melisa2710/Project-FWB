@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Ulasan Saya</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @forelse ($feedbacks as $feedback)
                <p>{{ $feedback->message }}</p>
            @empty
                <p>Belum ada ulasan.</p>
            @endforelse

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pesanan</th>
                        <th>Rating</th>
                        <th>Komentar</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $index => $feedback)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>#{{ $feedback->order_id }}</td>
                            <td>{{ $feedback->rating }} / 5</td>
                            <td>{{ $feedback->komentar }}</td>
                            <td>{{ $feedback->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
