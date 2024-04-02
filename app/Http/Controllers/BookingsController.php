<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\Order;
use App\Models\Seats;
use App\Models\Screenings;

class BookingsController extends Controller
{
public function index2($movieID) {
    $screenings = Screenings::where('MovieID', $movieID)->get();
    $seats = Seats::whereIn('ScreeningID', $screenings->pluck('ScreeningID'))->get();

    return view('user.bookings.index', compact('screenings', 'seats'));
}
}
