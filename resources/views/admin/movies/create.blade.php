
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .container {
      width: 800px;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      text-align: center;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-label {
      font-weight: bold;
    }
    
    .btn-submit {
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Add Movie</h1>
    <form action="/admin/movies" method="post" enctype="multipart/form-data">
    
      {{-- <div class="form-group">
        <label for="movieid" class="form-label">MovieId</label>
        <input type="text" class="form-control" id="" name="movieid" value="{{ old('movieid') }}">
      </div> --}}
      <div class="form-group">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="" name="title" value="{{ old('title') }}">
      </div>
      <div class="form-group">
        <label for="duration" class="form-label">Duration</label>
        <input type="number" class="form-control" id="" name="duration" value="{{ old('duration') }}">
      </div>
      <div class="form-group">
        <label for="director" class="form-label">Director</label>
        <input type="text" class="form-control" id="" name="director" value="{{ old('director') }}">
      </div>
      <div class="form-group">
        <label for="actors" class="form-label">Actors</label>
        <input type="text" class="form-control" id="" name="actors" value="{{ old('actors') }}">
      </div>
      <div class="form-group">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="" name="genre" value="{{ old('genre') }}">
      </div>
      <div class="form-group">
        <label for="rating" class="form-label">Rating</label>
        <input type="number" class="form-control" id="" min="1" max="10" name="rating" value="{{ old('rating') }}">
      </div>
      <div class="form-group">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="" name="image">
      </div>
      <input type="submit" class="btn btn-primary btn-submit" value="Thêm Mới"></input>
      @csrf
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
    @endif
  </div>
</body>
</html>
