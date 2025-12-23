<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Screening;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function create(Screening $screening): View
    {
        $screening->load('movie');

        return view('bookings.create', [
            'screening' => $screening,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'screening_id' => ['required', 'exists:screenings,id'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email'],
            'seats' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        $booking = Booking::create($validated);

        return redirect()
            ->route('movies.show', $booking->screening->movie_id)
            ->with('status', 'Đặt vé thành công! Hẹn gặp bạn tại rạp.');
    }
}
