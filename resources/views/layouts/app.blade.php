<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', sans-serif; background:#0c0f17; color:#f6f7fb; }
        .navbar { background:#111827; }
        .brand { color:#eab308; font-weight:700; letter-spacing:1px; }
        .card { background:#111827; border:1px solid #1f2937; }
        .card img { object-fit: cover; height: 260px; }
        .badge-maximus { background: linear-gradient(90deg, #eab308, #f97316); color:#0b0f19; }
        .hero { background: radial-gradient(circle at top left, rgba(234,179,8,0.15), transparent 35%),
                radial-gradient(circle at top right, rgba(249,115,22,0.1), transparent 45%),
                #0c0f17; }
        .footer { border-top:1px solid #1f2937; color:#9ca3af; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand brand" href="{{ route('home') }}">Maximus Cinema</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('movies.index') }}">Phim</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="py-5">
    <div class="container">
        @yield('content')
    </div>
</main>

<footer class="footer py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <span>© {{ date('Y') }} Maximus Cinema. All rights reserved.</span>
        <span class="small">Nơi trải nghiệm điện ảnh đỉnh cao.</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
