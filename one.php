<?php

require 'vendor/autoload.php';

$app = new \Slim\Slim();
$app->get('/hello/:name', 'get_func');
$app->post('/post', 'addUser');
$app->post('/put', 'updateUser');

$app->run();




function get_func($input)
{
	echo "Hello $input";
}

function addUser()
{
  global $app;
  $req = $app->request();
  $body = json_decode($req->getBody());
	$id = $body->{'id'};
	$name = $body->{'name'};

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dave";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn)
	{
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO sample (id, name) VALUES ($id, '$name')";

	if (mysqli_query($conn, $sql))
	{
	    echo "New record created successfully";
	}
	else
	{
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

}

function updateUser()
{
	global $app;
	$req = $app->request();
	$body = json_decode($req->getBody());

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dave";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn)
	{
			die("Connection failed: " . mysqli_connect_error());
	}

	$update_name_to = $body->{'name'};
	$update_name_for_id = $body->{'id'};
	$sql = "UPDATE sample SET name='$update_name_to' WHERE id=$update_name_for_id";

	if (mysqli_query($conn, $sql))
	{
			echo "Record updated successfully";
	}
	else
	{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

}


?>
