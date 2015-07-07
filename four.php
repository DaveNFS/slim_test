<?php

$id = $_POST["id"];
$name = $_POST["name"];

$url = 'http://localhost:80/slim_test/one.php/put';
$data = array('id' => intval($id), 'name' => $name);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);


?>
