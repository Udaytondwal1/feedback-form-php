<!-- include header/Navbar part of website -->
<?php include 'inc/header.php' ?> 

<?php
$name = $email = $body = "";
$nameErr = $emailErr = $bodyErr = "";

// check if submit button is set
if (isset($_POST['submit'])) {

  // then check inputs in empty, if empty then set error values
  // if not then get inputs from POST and sanitize them
  if (empty($_POST['name'])) {
    $nameErr = 'Name is required';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if (empty($_POST['email'])) {
    $emailErr = 'Email is required';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  if (empty($_POST['body'])) {
    $bodyErr = 'Feedback is required';
  } else {
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

  // // check if errors are empty then redirect to feedback page, if not then show error
  // if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
  //     header('Location: feedback.php');
  //   }
  }
?>

<img src="/feedback-php/img/logo.png" class="w-25 mb-3" alt="">
<h2>Feedback</h2>
<p class="lead text-center">Leave feedback for Traversy Media</p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control <?php echo $nameErr ? 'is-invalid' : null; ?>" id="name" name="name" placeholder="Enter your name">
    <div class="invalid-feedback">
      <?php echo $nameErr ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid' : null; ?>" id="email" name="email" placeholder="Enter your email">
    <div class="invalid-feedback">
      <?php echo $emailErr ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Feedback</label>
    <textarea class="form-control <?php echo $bodyErr ? 'is-invalid' : null; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
    <div class="invalid-feedback">
      <?php echo $bodyErr ?>
    </div>
  </div>
  <div class="mb-3">
    <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
  </div>
</form>

<!-- footer part include -->
<?php include 'inc/footer.php';
// include create.php this files gets input from this page and store data in data base using POST API
include 'data/create.php';
?>