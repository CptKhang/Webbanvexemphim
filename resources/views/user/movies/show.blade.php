
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
    

<div class="row">
    <div class="col-md-3">
        <div class="card mb-3">
            <img src="{{ asset('/movies/images/movies/' . $s->Image) }}" class="card-img-top1" alt="Movie Image">
        </div>
        <button class="dat-ve"> <a href="/user/bookings/{{$s->MovieID}}"> Đặt vé</a></button>
        
    </div>
    
    <div class="col-md-9">
        <div class="movie-details">
            <h5 class="movie-title">{{ $s->Title }}</h5>
            <p class="movie-info">Xem xếp hàng</p>
            <div class="movie-info star-rating" data-rating="10">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>{{$s->Rating}}<br>
            <p class="movie-info">Thời lượng: {{ $s->Duration }} Phút</p>
            <p class="movie-info">Thể loại: {{ $s->Genre }}</p><br>
            <p class="movie-info">Đạo diễn: {{ $s->Director }}</p><br>
            <p class="movie-info">Diễn viên: {{ $s->Actors }}</p> <br>
            <p class="movie-summary">Mai là một cô gái sinh ra trong một gia đình bất hạnh với người cha nghiện cờ bạc. Ở độ tuổi đẹp nhất của một người con gái, Mai đã phải trải qua một bi kịch không thể kinh khủng hơn. Vì chuyện này mà Mai phải làm đủ mọi việc để kiếm tiền hòng tồn tại giữa thành phố hoa lệ. Từ đây, số phận đưa đẩy khiến cô trở thành một cô gái massage. Tất nhiên, khác với những người đồng nghiệp, Mai chỉ "bán nghệ chứ không bán thân". Tuy nhiên, công việc này vẫn khiến cô chịu nhiều điều tiếng khi bị xem như gái bán hoa. Cuộc đời cô bất ngờ rẽ sang hướng khác khi cô gặp Trùng Dương – gã hàng xóm có biệt danh là Sâu sống đối diện căn phòng trọ của Mai. Trái ngược với Mai, Dương lại là chàng công tử sinh ra ở vạch đích, chuyển ra ngoài sống chỉ để tìm kiếm cảm hứng sáng tác theo đam mê của mình. Anh ta sống cuộc đời phóng túng, là tay "sát gái" và quyết tâm chiếm lấy Mai sau một lời thách đố với tay bạn thân. Mai là người phụ nữ khác với tất cả những cô gái từng lên giường với Dương. </p>
        </div>
    </div>
</div>
@endsection 
