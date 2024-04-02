@extends('layouts.user')

@section('phimhot')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/movies/images/images/1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/movies/images/images/2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/movies/images/images/3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    @endsection
@section('content')
    

<div class="container">
    <ul>
        <li><button>Phim đang chiếu</button></li>
        <li><button class="sap-chieu">Phim sắp chiếu</button></li>
    </ul>
</div>
</div>
<div class="row">

    @foreach ($movies as $movie)
    <div class="col-md-3">
     <div class="card mb-3">
        <img src="{{ asset('/movies/images/movies/' . $movie->Image) }}" class="card-img-top" alt="Movie Image">
        <div class="card-body">
            <h5 class="card-title">{{ $movie->Title }}</h5>
            <span class="movie-info">{{ $movie->Duration }} Phút</span>|
            <span class="movie-info">{{ $movie->Director }}</span>
            <p class="dat-ve "><a href="/user/bookings/{{$movie->MovieID}}"> Đặt vé</a></p>
            <p class="chi-tiet"><a href="/user/movies{{$movie->MovieID}}">Chi tiết</a></p>
        </div>
     </div>
</div>
@endforeach
</div>
<div class="row justify-content-center">
    <div class="col-12 text-center mt-4"> <!-- Điều chỉnh độ rộng của cột (col) để điều chỉnh chiều rộng của nút -->
        <button class="btn btn-secondary btn-block">Xem thêm</button> <!-- Sử dụng lớp btn-block để làm cho nút chiều ngang -->
    </div>
</div>
@endsection 