<?php include 'inc/header.php';
?>

<?php
error_reporting(0);
$jsonData = file_get_contents('http://localhost/feedback-php/data/read.php');
$data = json_decode($jsonData, true);
?>
<h2>Feedback</h2>
<div class="mx-auto">
    <?php
    if ($data && isset($data["data"])) {
        $feedback_arr = $data["data"];

        foreach ($feedback_arr as $item) : ?>
            <div class="card my-3 w-80">
                <div class="card-body text-center">
                    <?php echo $item['body']; ?>
                    <div class="text-secondary mt-2">
                    By <?php echo $item['name']; ?> on 
                    <?php echo date_format(date_create($item['date']),'g:ia \o\n l jS F Y'); ?></div>
                </div>
            </div>
    <?php endforeach;
    } else {
        echo "Failed to decode JSON data";
    }
    ?>
</div>
<?php include 'inc/footer.php' ?>