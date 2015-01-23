<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'national_parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');

require('../db_connect.php');
	
function getParks($dbc) {
    // Bring the $dbc variable into scope somehow
    return $dbc->query('SELECT * FROM national_parks')->fetchAll(PDO::FETCH_ASSOC);
}// add limit
$offset = 0;
$parks = getParks($dbc);
?>
<html>
<head>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<title>National Parks</title>
</head>
<body>
	<center><h1><u><b>Address Book<b></u></ht></center>
<table class ="table table-hover">	
	
	<th>Name</th>
	<th>Location</th>
	<th>Date Established</th>
	<th>Area in Acres</th>
	<th>Description</th>

 <? foreach($parks as $key => $park): ?>
		<tr>
			<td>
				<?= $park['location'] ?>
			</td>	
		 	<td>
				<?= $park['name'] ?>
			</td>
			<td>
				<?= $park['date_established'] ?>
			</td>
			<td>
				<?= $park['area_in_acres'] ?>
			</td>
			<td>
				<?= $park['description'] ?>
			</td>
		</tr>
<? endforeach; ?>

</table>

<!--Creating the table where user enters in data-->
	 <form method="POST" action="national_parks.php">
        <p>
            <label for="location"></label>
			<input type="text" id="location" name="location" value="" placeholder="Location">
        </p>

        <p>
            <label for="name"></label>
			<input type="text" id="name" name="name" value="" placeholder="Name">
        </p>
		
		<p>
            <label for="date_established"></label>
			<input type="text" id="date_established" name="date_established" value="" placeholder="Date of Establishment">
        </p>
        
        <p>
            <label for="area_in_acres"></label>
			<input type="text" id="area_in_acres" name="area_in_acres" value="" placeholder="Area in Acres">
        </p>

		<p>
            <label for="description"></label>
			<input type="text" id="description" name="description" value="" placeholder="Description of Park">
        </p>

		<button type="submit">Submit</button>
	</form>

</body>
</html>