<?php

error_reporting(0);
// added access headers 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Authorization, X-Request-With');

include('function.php');

$RequestMethod = $_SERVER['REQUEST_METHOD'];
// check request method
if($RequestMethod == "GET"){

    $feedbackList = getFeedbackList();
    // print data coming from getFeedbackList function
    echo $feedbackList;

}else{
    $data = [
        'status' => 405,
        'message' => $RequestMethod.' method not allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

?>