<?php
	$name = $_POST['sub_name'];
	$email = $_POST['sub_email'];
	$dbc = mysqli_connect('localhost:3306','brainspa_molefe','Faizo4apple','brainspa_newsletters')
			or die('error connection to my sql');


	$query = "INSERT INTO subscribers(name,email)VALUES('$name','$email')";
			

	$result = mysqli_query($dbc,$query)
				or die('Error querying database.');
			
	mysqli_close($dbc);
	header("location:../../signupsuccess.php");	
?>