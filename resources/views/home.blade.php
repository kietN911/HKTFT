@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="hero rounded-4 p-5 mb-5 shadow-sm">
    <div class="row align-items-center">
        <div class="col-lg-7">
            <p class="badge badge-maximus px-3 py-2">Rạp chiếu phim Maximus Cinema</p>
            <h1 class="display-5 fw-bold mt-3">Đặt vé nhanh chóng, tận hưởng bom tấn ngay hôm nay</h1>
            <p class="lead text-secondary">Lịch chiếu cập nhật liên tục, phòng chiếu hiện đại và dịch vụ đặt vé trực tuyến tiện lợi.</p>
            <a href="{{ route('movies.index') }}" class="btn btn-warning btn-lg mt-3">Xem phim đang chiếu</a>
        </div>
        <div class="col-lg-5 text-lg-end mt-4 mt-lg-0">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <h5 class="card-title text-warning">Suất chiếu sắp tới</h5>
                    <ul class="list-group list-group-flush">
                        @foreach($upcomingScreenings as $screening)
                            <li class="list-group-item bg-transparent text-light d-flex justify-content-between align-items-center">
                                <span>
                                    <strong>{{ $screening->movie->title }}</strong><br>
                                    <small class="text-secondary">{{ $screening->start_time->format('d/m H:i') }} · {{ $screening->auditorium }}</small>
                                </span>
                                <a href="{{ route('bookings.create', $screening) }}" class="btn btn-outline-warning btn-sm">Đặt vé</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="fw-semibold mb-4">Phim nổi bật</h2>
<div class="row g-4">
    @foreach($featuredMovies as $movie)
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ $movie->poster_url }}" class="card-img-top" alt="{{ $movie->title }}">
                <div class="card-body d-flex flex-column">
                    <span class="badge badge-maximus mb-2">{{ $movie->rating ?? 'P' }}</span>
                    <h5 class="card-title">{{ $movie->title }}</h5>
                    <p class="text-secondary small mb-3">{{ Str::limit($movie->description, 80) }}</p>
                    <a href="{{ route('movies.show', $movie) }}" class="btn btn-outline-warning mt-auto">Xem chi tiết</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
