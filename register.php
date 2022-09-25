<?php
// error_reporting(E_ERROR | E_PARSE);
include(__DIR__ . '/config/index.php');
include(__DIR__ . '/config/utils.php');
// if its post request and submitted using submit btn
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // hash using md5

    // check if email is already registered
    if (checkIfEmailExist($email, $conn)) {
      $addQuery = "INSERT INTO users (name,email,password,isAdmin) values('$name','$email','$password','FALSE')";

      if ($conn->query($addQuery) === TRUE) {
        header("Location: login.php?type=registered");
      } else {
        echo "Error: " . $addQuery . "<br>" . $conn->error;
      }
    } else {
      header("Location: register.php?type=alreadyExist");
    }
    exit();
  }
}

function showMessage($type)
{
  if ($type == 'error') {
    return 'Something went wrong! please try again.';
  } elseif ($type == 'alreadyExist') {
    return 'User already exist with provided email.';
  }
}

?>
<?php include './head/index.php' ?>

<form method="post" action="" class="register_form">
  <h4 class="form_header">Register</h4>

  <input required type="text" name="name" placeholder="Your Name" /><br>
  <input required type="email" name="email" placeholder="Your Email" /><br>
  <input required type="password" name="password" placeholder="Password" /><br>
  <p class="error_msg"><?php echo showMessage($_GET['type']);  ?></p>
  <button type="submit" name="submit">Register</button>
</form>