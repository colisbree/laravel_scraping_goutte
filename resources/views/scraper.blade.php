<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel Scraper</title>
    <style>
        .wrapper > .card:first-child .card-header {
            background-color: orange;
            color: white;
        }

        .wrapper > .card:nth-child(2) .card-header {
            background-color: red;
            color: white;
        }

        .wrapper > .card:nth-child(3) .card-header {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5 wrapper">
                @foreach ($data as $key=>$value)
                    
                    <div class="card text-center mt-4">
                        <h5 class="card-header">{{ $key }}</h5>
                        <div class="car-body">
                            <p class="car-text">{{ $value }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>