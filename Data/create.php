<?php

error_reporting(0);
header('Access-Control-Allow-Origin:*');
// header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With');

include('function.php');

$RequestMethod = $_SERVER['REQUEST_METHOD'];

if ($RequestMethod == "POST") {

    // $inputData = json_encode(file_get_contents("php://input"), true);
    $inputData = '';

    if (empty($inputData)) {

        $storeFeedback = storeFeedback($_POST);
    } else {

        $storeFeedback = storeFeedback($inputData);
    }

    header("Location: /index.php");
    exit();

    // echo $storeFeedback;
} else {
    $data = [
        'status' => 405,
        'message' => $RequestMethod . ' Method Not Allowed'
    ];
    header('HTTP/1.0 405 Method Not Allowed');
    echo json_encode($data);
}
