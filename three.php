<?php



// echo $_POST["name"];
// echo "<br>";
// echo $_POST["id"];

$id = $_POST["id"];
$name = $_POST["name"];

$url = 'http://localhost:80/slim_test/one.php/post';
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




// $data = array("name" => $name, "id" => intval($id));
// $data_string = json_encode($data);
//
// echo $data_string;
//
// $ch = curl_init('http://localhost:9001/slim_test/one.php/post');
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_VERBOSE, true);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen($data_string))
// );
//
// echo "about to exec curl";
//
// if(curl_exec($ch) === false)
// {
//     echo 'Curl error: ' . curl_error($ch);
// }
// else
// {
//     echo 'Operation completed without any errors';
// }
// ?>
