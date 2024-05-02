<?php

include '../config/database.php';

function err422($message){
    $data = [
        'status' => 422,
        'message' => $message,
    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    return json_encode($data);
    exit();
}


function storeFeedback($feedbackInput){

    global $conn;

    $name = mysqli_real_escape_string($conn, $feedbackInput['name']);
    $email = mysqli_real_escape_string($conn, $feedbackInput['email']);
    $body = mysqli_real_escape_string($conn, $feedbackInput['body']);

    if (empty(trim($name))) {

        return err422('Enter Your Name');

    } elseif(empty(trim($email))) {

        return err422('Enter Your Email');
       
    }elseif(empty(trim($body))) {

        return err422('Enter Your Feedback');
       
    }else {
         
      $query = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";
      $result = mysqli_query($conn, $query);

      if($result){
     
        $data = [
            'status' => 201,
            'message' => 'Feedback Stored Sucessfully',
        ];
        header("HTTP/1.0 201 Stored");
        return json_encode($data);
        // header("Location: ");
        exit();
     
      }else{

      }

    }
    
};


function getFeedbackList()
{
    global $conn;

    $query = "SELECT * FROM feedback";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        if (mysqli_num_rows($query_run) > 0) {

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Feedback List Fetched Successfully',
                'data' => $res
            ];
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {

            $data = [
                'status' => 404,
                'message' => 'Feedbacks Not Found'
            ];
            http_response_code(404);
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
