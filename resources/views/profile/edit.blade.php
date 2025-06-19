@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profil Pengguna</h1>

    <!-- Profile Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Profil</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img class="img-profile rounded-circle mb-3" src="{{ asset('sb-admin/img/undraw_profile.svg') }}" alt="Profile Picture" style="width: 150px;">
                </div>
                <div class="col-md-8">
                    <h4>{{ $user->name }}</h4>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Tanggal Daftar:</strong> {{ $user->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Profil</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                @include('profile.partials.update-profile-information-form')
                <button type="submit" class="btn btn-primary">Update Profil</button>
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Delete User Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Hapus Akun</h6>
        </div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection