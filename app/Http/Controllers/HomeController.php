<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Screening;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $featuredMovies = Movie::with('screenings')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        $upcomingScreenings = Screening::with('movie')
            ->where('start_time', '>=', Carbon::now())
            ->orderBy('start_time')
            ->take(6)
            ->get();

        return view('home', [
            'featuredMovies' => $featuredMovies,
            'upcomingScreenings' => $upcomingScreenings,
        ]);
    }
}
