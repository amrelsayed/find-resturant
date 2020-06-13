<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
            }

            input {
                padding: 4px;
                margin-bottom: 12px;
            }

            .error {color: red;}

        </style>
    </head>
    <body>
        <div class="container">
           
            <h2>Find Resturants</h2>
            
            @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <form method="get" action="/">
                <input type="text" name="meal_name" placeholder="Meal name"><br>
                <input type="text" name="latitude" placeholder="Latitude"><br>
                <input type="text" name="longitude" placeholder="Longitude"><br>
                <input type="submit" value="find">
            </form>
            @if (count($resturnats) > 0)
                <ul>
                    @foreach($resturnats as $resturant)
                    <li>
                        {{ $resturant->name }}
                        <ul>
                            <li>Distance: {{ $resturant->distance }}</li>
                            <li>Recommendation: {{ $resturant->recommendations }}</li>
                            <li>Successful Orders: {{ $resturant->successful_orders }}</li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            @else
                <p>No result</p>
            @endif
        </div>
    </body>
</html>
