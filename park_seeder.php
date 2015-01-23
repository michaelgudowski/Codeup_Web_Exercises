<?php
	
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'national_parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');

require('db_connect.php');

$parks = [
    ['name' => 'Arches',   'location' => 'Utah', 'date_established' => '1929-04-12', 'area_in_acres' => '76518.98', 'description' => 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins.'],
    ['name' => 'Haleakala',   'location' => 'Hawaii', 'date_established' => '1916-08-01', 'area_in_acres' => '29093.67', 'description' => 'The Haleakalā volcano on Maui features a very large crater with numerous cinder cones, Hosmer\'s Grove of alien trees, the Kipahulu section\'s scenic pools of freshwater fish, and the native Hawaiian Goose.'],
    ['name' => 'Death Valley', 'location' => 'California', 'date_established' => '1994-10-1994', 'area_in_acres' => '3372401.96', 'description' => 'Death Valley is the hottest, lowest, and driest place in the United States. Daytime temperatures have topped 130 °F (54 °C) and it is home to Badwater Basin, the lowest elevation in North America.'],
    ['name' => 'Carlsbad Caverns', 'location' => 'New Mexico', 'date_established' => '1930-05-14', 'area_in_acres' => '46766.45', 'description' => 'Carlsbad Caverns has 117 caves, the longest of which is over 120 miles (190 km) long. The Big Room is almost 4,000 feet (1,200 m) long, and the caves are home to over 400,000 Mexican Free-tailed Bats and sixteen other species.'],
    ['name' => 'Olympic', 'location' => 'Washington', 'date_established' => '1938-06-29', 'area_in_acres' => '922650.86', 'description' => 'Situated on the Olympic Peninsula, this park straddles a diversity of ecosystems from Pacific shoreline to temperate rainforests to the alpine slopes of Mount Olympus.'],
    ['name' => 'Big Ben', 'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => '801163.21', 'description' => 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river.'],
    ['name' => 'Petrified Forest', 'location' => 'Arizona', 'date_established' => '1962-12-09', 'area_in_acres' => '93532.57', 'description' => 'This portion of the Chinle Formation has a great concentration of 225-million-year-old petrified wood. The surrounding Painted Desert features eroded cliffs of wonderfully red-hued volcanic rock called bentonite.'],
    ['name' => 'Glacier',   'location' => 'Montana', 'date_established' => '1910-05-11', 'area_in_acres' => '1013572.41', 'description' => 'The U.S. half of Waterton-Glacier International Peace Park, this park hosts 26 glaciers and 130 named lakes beneath a stunning canopy of Rocky Mountain peaks. There are historic hotels and a landmark road in this region of rapidly receding glaciers.'],
    ['name' => 'Crater Lake', 'location' => 'Oregon', 'date_established' => '1902-05-22', 'area_in_acres' => '183224.05', 'description' => 'Crater Lake lies in the caldera of an ancient volcano called Mount Mazama that collapsed 7,700 years ago. It is the deepest lake in the United States and is famous for its vivid blue color and water clarity.'],
    ['name' => 'Aradia',   'location' => 'Maine', 'date_established' => '1919-02-26', 'area_in_acres' => '47389.67', 'description' => 'Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes' ]

];

$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

foreach ($parks as $park) {
    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location',  $park['location'],  PDO::PARAM_STR);
    $stmt->bindValue(':date_established',  $park['date_established'],  PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres',  $park['area_in_acres'],  PDO::PARAM_STR);
    $stmt->bindValue(':description',  $park['description'],  PDO::PARAM_STR);

    $stmt->execute();


    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}