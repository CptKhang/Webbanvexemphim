@extends('layouts.user')

@section('content')

@if(isset($cartData) && !empty($cartData))
    <div class="cart-info">
        <h2>Cart Information</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Movie</th>
                    <th>Room</th>
                    <th>Seats</th>
                    <th>Number of Seats</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $movies->Title }}</td>
                    <td>{{ $room}}</td>
                    <td>{{ $cartData['seat_ids'] }}</td>
                    <td>{{ $cartData['number_of_seats'] }}</td>
                    <td>{{ number_format( $cartData['total_price']) }} VND</td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('checkout') }}" method="post">
            @csrf
            <!-- Các trường ẩn để truyền UserID, ScreeningID, SeatID -->
            <input type="hidden" name="UserID" value="{{ $cartData['user_id'] }}">
            <input type="hidden" name="ScreeningID" value="{{ $cartData['screening_id'] }}">
            <input type="hidden" name="SeatID" value="{{ $cartData['seat_ids'] }}">
            <!-- Nút thanh toán -->
            <button type="submit" class="btn btn-outline-success">Thanh Toán</button>
           
        </form>
        
    </div>
@else
    <p>No data in cart</p>
@endif

@endsection
