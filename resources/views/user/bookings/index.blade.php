@extends('layouts.user')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card mb-3">
            {{-- Đặt ảnh của phim ở đây --}}
            <img src="{{ asset('/movies/images/movies/' . $screenings->first()->movie->Image) }}" class="img-fluid" alt="Movie Image">
        </div>
    </div>
    <div class="col-md-6">
        @php
            $groupedScreenings = $screenings->groupBy(function($screening) {
                return date('d-m-Y', strtotime($screening->StartTime));
            });
        @endphp
        

        @foreach ($groupedScreenings as $date => $screenings)
            <div class="mb-2">
                <h3 class="d-flex">{{ $date }}</h3>
                <div class="d-flex flex-row flex-wrap">
                    @foreach ($screenings as $screening)
                        <div class="mx-2 my-2">
                            <button class="button-style selected-screening:hover" onclick="showSeats('{{ $screening->Room }}', {{ $screening->seats }}, '{{ $screening->ScreeningID }}')">
                                <p class="font">{{ $screening->Room }}</p><hr>
                                <p>{{ date('H:i', strtotime($screening->StartTime)) }} - {{ date('H:i', strtotime($screening->EndTime)) }}</p>
                                @php
                                    $availableSeats = $screening->seats->where('Status', 'Available')->count();
                                    $bookedSeats = $screening->seats->where('Status', 'Booked')->count();
                                    $Seats = $screening->seats->count();
                                @endphp
                                <hr>
                                <p class="font">{{ $availableSeats }} / {{$Seats}} ghế ngồi</p>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-3">
        <div id="seatListContainer" style="display: none;">
            <h4 id="selectedRoom"></h4>
            <ul id="seatList"></ul>
            
            <ul>{{' --------------------------------------------- '}}</ul>
        
            <UL class=" btn ">   
                <form id="cartForm" action="/user/bookings/cart" method="post">
                    @csrf
                    <!-- Các trường ẩn khác -->
                    <input type="hidden" name="UserID" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="ScreeningID" id="screeningIDInput" value="">

                
                    <!-- Trường ẩn để lưu trữ SeatIDs -->
                    <input type="hidden" name="SeatID" id="selectedSeatsInput" value="">
                    <!-- Trong form -->
                    <input  type="button" value="Đặt Vé" onclick="submitForm()">
                </form>
        
            </UL>
        
            
        </div>
    </div>
</div>

<script>
    var selectedSeats = []; // Mảng lưu trữ các ghế đã được chọn

    function showSeats(room, seats, screeningID) {
        var seatListContainer = document.getElementById('seatListContainer');
        var seatList = document.getElementById('seatList');
        var selectedRoom = document.getElementById('selectedRoom');
    
        seatList.innerHTML = '';
        selectedRoom.innerText = room;

        seats.forEach(function(seat) {
            var seatButton = document.createElement('button');
            seatButton.innerText = seat.SeatNumber;
            seatButton.classList.add('seat-button');
            if (seat.Status === 'Available') {
                seatButton.classList.add('available-seat');
            } else {
                seatButton.classList.add('booked-seat');
            }

            // Thêm sự kiện click cho mỗi nút
            seatButton.addEventListener('click', function() {
                toggleSeat(seat, seatButton);
            });

            seatList.appendChild(seatButton);
        });

        seatListContainer.style.display = 'block';
        document.getElementById('screeningIDInput').value = screeningID;
    }


    function toggleSeat(seat, seatButton) {
        var index = selectedSeats.findIndex(function(selectedSeat) {
            return selectedSeat.SeatNumber === seat.SeatNumber;
        });

        if (index === -1) {
            selectedSeats.push(seat);
            seatButton.classList.add('selected-seat');
            addSelectedSeatName(seat.SeatNumber);
        } else {
            selectedSeats.splice(index, 1);
            seatButton.classList.remove('selected-seat');
            removeSelectedSeatName(seat.SeatNumber);
        }
    }

    function addSelectedSeatName(seatNumber) {
        var selectedSeatsList = document.getElementById('selectedSeatsList');
        var seatNameItem = document.createElement('li');
        seatNameItem.innerText = seatNumber;
        selectedSeatsList.appendChild(seatNameItem);
    }

    function removeSelectedSeatName(seatNumber) {
        var selectedSeatsList = document.getElementById('selectedSeatsList');
        var seatNameItems = selectedSeatsList.getElementsByTagName('li');
        for (var i = 0; i < seatNameItems.length; i++) {
            if (seatNameItems[i].innerText ===  seatNumber) {
                selectedSeatsList.removeChild(seatNameItems[i]);
                break;
            }
        }
    }
    
    // Trong script
    // Trong script
function submitForm() {
    // Kiểm tra xem có ghế nào được chọn hay không
    if (selectedSeats.length === 0) {
        // Nếu không có ghế nào được chọn, hiển thị thông báo lỗi
        alert('Vui lòng chọn ghế trước khi đặt vé.');
        return; // Dừng việc gửi form
    }

    // Lấy giá trị của ScreeningID
    var screeningID = document.getElementById('screeningIDInput').value;
    
    // Lấy tất cả các SeatID đã chọn
    var selectedSeatIDs = selectedSeats.map(function(seat) {
        return seat.SeatID;
    });
    
    // Đặt giá trị của trường ẩn SeatIDs
    document.getElementById('selectedSeatsInput').value = selectedSeatIDs.join(',');
    
    // Submit form
    document.getElementById('cartForm').submit();
}

</script>
@endsection
