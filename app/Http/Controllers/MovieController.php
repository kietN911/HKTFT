<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('screenings')->orderBy('title')->get();

        return view('movies.index', [
            'movies' => $movies,
        ]);
    }

    public function show(Movie $movie)
    {
        $movie->load(['screenings' => fn ($query) => $query->orderBy('start_time')]);

        return view('movies.show', [
            'movie' => $movie,
        ]);
    }
}
