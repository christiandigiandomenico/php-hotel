<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];


$parkingHotelCheck = $_GET['parkingcheck'];

$starHotelCheck = $_GET['starcheck'];

if ($parkingHotelCheck) {

    $hotels = array_filter($hotels, function($hotel) {
        return $hotel['parking'];
    });

};

if ($starHotelCheck) {

    $hotels = array_filter($hotels, function($hotel)use($starHotelCheck) {
        return $hotel['vote'] >= $starHotelCheck;
    });

};

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Hotels</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<h1>Hotels</h1>

<hr>

<?php

$filteredHotels = [];

foreach($hotels as $parkingHotel) {

    if ($parkingHotel['parking'] == true) {
        $filteredHotels[] = $parkingHotel;
    }
};

?>

<form>
<div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="parkingcheck">
  <label class="form-check-label" for="flexCheckDefault">
    Parking
  </label>
</div>

<div class="form-floating">
  <textarea class="form-control mb-3" placeholder="Leave a comment here" id="floatingTextarea" name="starcheck"></textarea>
  <label for="floatingTextarea">Number of stars</label>
</div>

<input type="submit">
</form>


<table class="table">
  <thead>
    <tr>
        <?php

            $keysParking = array_keys($filteredHotels[0]);

            echo '<tr>';
                foreach ($keysParking as $key) {
            echo '<th scope="col">' . $key . '</th>';
            }
            echo '</tr>'; 

        ?>
    </tr>
  </thead>
  <tbody>

        <?php

            foreach($hotels as $hotel) {
            echo '<tr>';
            foreach ($hotel as $value) {
            echo '<td>' . $value . '</td>';
                }
            echo '</tr>';
            }

        ?>
    
  </tbody>
</table>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>