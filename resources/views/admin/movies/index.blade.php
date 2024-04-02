@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movies</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    
    h1 {
      text-align: center;
    }
    
    .movies-list {
      margin-top: 30px; 
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      grid-gap: 20px;
      
    }
    
    .movie {
      display: flex; /* Sử dụng flexbox để căn chỉnh nội dung */
      background-color: #f9f9f9;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      
    }
    .movie:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    
    .movie-image {
      flex: 0 0 150px; /* Kích thước cố định cho phần hình ảnh */
      background-size: cover; /* Đảm bảo hình ảnh được hiển thị đầy đủ */
      border-radius: 5px 0 0 5px; /* Bo tròn góc cho phần hình ảnh */
    }
    
    .movie-details {
      flex: 1; /* Phần còn lại của div sẽ mở rộng theo chiều ngang */
      padding: 20px;
    }
    
    .movie h2 {
      margin-top: 0;
    }
    /* Đảm bảo .movie-details được định vị tương đối */
  </style>
</head>
<body>
  <div class="container">
    <div class="movies-list">
      @foreach ($movies as $item)
      <div class="movie" > 
        <div class="movie-image" style="background-image: url('/movies/images/movies/{{ $item->Image }}');"></div>
        <div class="movie-details">
          <h2>{{ $item->Title }}</h2>
          <p><strong>Director:</strong> {{ $item->Director }}</p>
          <p><strong>Actors:</strong> {{ $item->Actors }}</p>
          <p><strong>Genre:</strong> {{ $item->Genre }}</p>
          <p><strong>Rating:</strong> {{ $item->Rating }}</p>
        </div>
      </div>
      @endforeach
      {{-- <div class="container text-center mt-4">
        <a href="/admin/movies/create" class="btn btn-primary mx-2">Create Movie</a>
        <a href="/admin/screenings" class="btn btn-secondary mx-2">Screenings</a>
      </div>
       --}}
      
    </div>
  </div>
</body>
</html>  
@endsection

