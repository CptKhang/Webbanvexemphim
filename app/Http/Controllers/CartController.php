<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\BookingsController;
use App\Models\Bookings;

use App\Models\Seats;
use App\Models\Screenings;
use App\Models\Order;
use App\Models\Order_detail;

class CartController extends Controller
{
    //
    // function index()
    // {
    //     return View('user.bookings.cart');
    // }
    public function add(Request $request)
    {

        $userId = $request->input('UserID');
        $screeningId = $request->input('ScreeningID');
        $seatId = $request->input('SeatID');
        $numberOfSeats = count(explode(',', $seatId));
        $totalPrice = $numberOfSeats * 100000;
        $screening = Screenings::find($screeningId);
        $movies = $screening->movie;
        $room = $screening->Room;


        $cartData = [
            'user_id' => $userId,
            'screening_id' => $screeningId,
            'seat_ids' => $seatId,
            'number_of_seats' => $numberOfSeats,
            'total_price' => $totalPrice,

        ];

        $request->session()->put('cart', $cartData);


        return view('user.bookings.cart', compact('cartData', 'room', 'movies'))
            ->with('message', 'Seats added to cart successfully!');
    }

     public function checkout(Request $request)
    {
        // Lấy thông tin từ request
        $userId = $request->input('UserID');
        $screeningId = $request->input('ScreeningID');
        $seatId = $request->input('SeatID');
        $numberOfSeats = count(explode(',', $seatId));
        $totalPrice = $numberOfSeats * 100000;

        // Tạo mới đối tượng Bookings
        $booking = new Bookings();
        $booking->user_id = $userId;
        $booking->screening_id = $screeningId;
        $booking->seat_ids = $seatId;
        $booking->number_of_seats = $numberOfSeats;
        $booking->total_price = $totalPrice;

        // Lưu đơn hàng vào cơ sở dữ liệu
        $booking->save();
        $this->updateSeatStatus($screeningId, $seatId);

        // Redirect hoặc trả về view thành công
        return redirect('/orders');
    }
    public function viewOrders()
    {
        $orders = Bookings::where('user_id', auth()->id())->get();
    
        // Truy xuất thông tin về phòng chiếu và tên phim
       
        return view('user.orders.index', compact('orders'));
    }
private function updateSeatStatus($screeningId, $seatId)
    {
        $seats = Seats::whereIn('SeatID', explode(',', $seatId))->where('ScreeningID', $screeningId)->get();
    
    // Cập nhật trạng thái của từng ghế
    foreach ($seats as $seat) {
        $seat->Status = 'Booked'; // Sửa thành 'Booked' cho phù hợp với tên cột trong cơ sở dữ liệu
        $seat->save();
    }
    }

}
 // foreach ($orders as $order) {
        //     $screening = Screenings::find($order->screening_id);
        //     $order->room = $screening->Room;
        //     $order->movie_title = $screening->movie->Title;
        //     $seats = Seats::whereIn('SeatID', explode(',', $order->seat_ids))->where('ScreeningID', $order->screening_id)->get();
        //     $order->seats = $seats;
        // }
    
