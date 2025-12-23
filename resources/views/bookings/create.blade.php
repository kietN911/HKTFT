@extends('layouts.app')

@section('title', 'Đặt vé')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-3">Đặt vé - {{ $screening->movie->title }}</h3>
                <p class="text-secondary">{{ $screening->start_time->format('d/m/Y H:i') }} · {{ $screening->auditorium }}</p>
                <p class="text-secondary">Giá vé: {{ number_format($screening->price, 0, ',', '.') }} đ</p>

                <form method="POST" action="{{ route('bookings.store') }}" class="mt-4">
                    @csrf
                    <input type="hidden" name="screening_id" value="{{ $screening->id }}">

                    <div class="mb-3">
                        <label class="form-label">Họ tên</label>
                        <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name') }}" required>
                        @error('customer_name')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="customer_email" class="form-control" value="{{ old('customer_email') }}" required>
                        @error('customer_email')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số ghế</label>
                        <input type="number" name="seats" min="1" max="10" class="form-control" value="{{ old('seats', 1) }}" required>
                        @error('seats')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('movies.show', $screening->movie) }}" class="btn btn-outline-light">Quay lại</a>
                        <button type="submit" class="btn btn-warning">Xác nhận đặt vé</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
