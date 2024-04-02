@extends('layouts.user')

@section('content')

<h2>My Orders</h2>

@if($orders->isEmpty())
    <p>No orders found.</p>
@else
    <div class="row">
        @foreach($orders as $order)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order ID: {{ $order->id }}</h5>
                        <p class="card-text">Screening ID: {{ $order->screening_id }}</p>
                        <p class="card-text">Seat IDs: {{ $order->seat_ids }}</p>
                        
                        <p class="card-text">Number of Seats: {{ $order->number_of_seats }}</p>
                        <p class="card-text">Total Price: {{ number_format($order->total_price) }} vnd</p>
                   
                       
                        <p class="card-text">Order Date: {{ $order->created_at }}</p>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection

{{-- <p class="card-text">{{ $order->room }}</p>
<p class="card-text">Movie: {{ $order->movie_title }}</p>
<p class="card-text">Seat IDs:
    @foreach($order->seats as $seat)
        {{ $seat->SeatNumber }},
    @endforeach
</p> --}}
