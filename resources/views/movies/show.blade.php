@extends('layouts.app')

@section('title', $movie->title)

@section('content')
<div class="row g-4">
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <img src="{{ $movie->poster_url }}" class="card-img-top" alt="{{ $movie->title }}">
            <div class="card-body">
                <span class="badge badge-maximus mb-2">{{ $movie->rating ?? 'P' }}</span>
                <h3 class="card-title">{{ $movie->title }}</h3>
                <p class="text-secondary">{{ $movie->description }}</p>
                <p class="mb-0 text-secondary">Thời lượng: {{ $movie->duration_minutes }} phút</p>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-3">Lịch chiếu</h4>
                <div class="table-responsive">
                    <table class="table align-middle text-light">
                        <thead>
                            <tr>
                                <th>Ngày giờ</th>
                                <th>Phòng</th>
                                <th>Giá vé</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movie->screenings as $screening)
                                <tr>
                                    <td>{{ $screening->start_time->format('d/m/Y H:i') }}</td>
                                    <td>{{ $screening->auditorium }}</td>
                                    <td>{{ number_format($screening->price, 0, ',', '.') }} đ</td>
                                    <td><a href="{{ route('bookings.create', $screening) }}" class="btn btn-warning btn-sm">Đặt vé</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
