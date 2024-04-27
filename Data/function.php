<?php 

require '../config/database.php';

function getFeedbackList(){
    global $conn;

    $query = "SELECT * FROM feedback";
    $query_run = mysqli_query($conn, $query);

    if($query_run){

        if(mysqli_num_rows($query_run) > 0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data = [
                'status' => 200,
                'message' => 'Feedback List Fetched Sucessfully'
            ];
            header('HTTP/1.0 Sucess!');
            return json_encode($data);

        }else{
            
             $data = [
                'status' => 404,
                'message' => 'Feedbacks Not Found'
             ];
             header('HTTP/1.0 Feedbacks Not Found');
             return json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        header('HTTP/1.0 Internal Server Error');
        return json_encode($data);
    }
}

?>