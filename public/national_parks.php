<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'national_parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');

require('../db_connect.php');
	 //print_r($stmt->fetch(PDO::FETCH_ASSOC));
	//print_r($stmt->fetch(PDO::FETCH_NUM));
	// print_r($stmt->fetch(PDO::FETCH_BOTH));

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
<table>	


<?php $stmt = $dbc->query('SELECT * FROM national_parks');

    // $rows = array();
    while ($row = $stmt->fetch()) {
        // $rows[] = $row;
		print_r($row);
	}
?>
</table>
</body>
</html>