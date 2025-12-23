@extends('layouts.app')

@section('title', 'Danh sách phim')

@section('content')
<h1 class="fw-semibold mb-4">Danh sách phim</h1>
<div class="row g-4">
    @foreach($movies as $movie)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ $movie->poster_url }}" class="card-img-top" alt="{{ $movie->title }}">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge badge-maximus">{{ $movie->rating ?? 'P' }}</span>
                        <small class="text-secondary">{{ $movie->duration_minutes }} phút</small>
                    </div>
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="text-secondary small">{{ Str::limit($movie->description, 100) }}</p>
                    <a href="{{ route('movies.show', $movie) }}" class="btn btn-outline-warning mt-auto">Chi tiết &amp; lịch chiếu</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
