<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Screenings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
        }
        .screening {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Screenings</h1>
        <div class="row">
            @foreach ($data as $screening)
            <div class="col-md-6">
                <div class="screening">
                    <h2>{{ $screening->movie->Title }}</h2>
                    <p><strong>Start Time:</strong> {{ $screening->StartTime }}</p>
                    <p><strong>End Time:</strong> {{ $screening->EndTime }}</p>
                    <p><strong>Room:</strong> {{ $screening->Room }}</p>
                    <h3>Seats:</h3>
                    <ul>
                        @foreach ($screening->seats as $seat)
                            <li>Seat Number: {{ $seat->SeatNumber }}, Status: {{ $seat->Status }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
