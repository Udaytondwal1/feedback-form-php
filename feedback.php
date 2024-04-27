<?php include 'inc/header.php';
?>

<?php
error_reporting(0);
$jsonData = file_get_contents('http://localhost/feedback-php/data/read.php');
$data = json_decode($jsonData, true);
?>
<h2>Feedback</h2>
<div class="my-3">
    <?php
    if ($data && isset($data["data"])) {
        $feedback_arr = $data["data"];

        foreach ($feedback_arr as $feedback) {
            $name = $feedback['name'];
            $email = $feedback['email'];
            $feedbackBody = $feedback['body'];
            $datetime = $feedback['date'];

            echo "<div class='card my-3'>
               <b>Name: $name<br/>
                Email: $email<br/>
                Feedback: $feedbackBody<br/>
                Date: $datetime </b>
                </div>";
        }
    } else {
        echo "Failed to decode JSON data";
    }
    ?>
</div>
<?php include 'inc/footer.php' ?>