<?php
// error_reporting(E_ERROR | E_PARSE);
session_start();
include(__DIR__ . '/config/index.php');
include(__DIR__ . '/config/utils.php');

// if its post request and submitted using submit btn
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['submit'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];
		// check if provided email exist
		if (checkIfEmailExist($email, $conn)) {
			header("Location: login.php?type=userNotFound");
		} else {
			$selectEmailQuery = "SELECT password,id,isAdmin, name FROM users WHERE email='$email'";
			$result = $conn->query($selectEmailQuery);
			while ($row = $result->fetch_assoc()) {
				if (md5($password) == $row['password']) {
					// set login session
					$_SESSION["ID"] = $row['id'];
					$_SESSION["isAdmin"] = $row['isAdmin'];
					$_SESSION["name"] = $row['name'];
					header("Location: index.php?type=loggedIn");
				} else {
					header("Location: login.php?type=passwordNotMatched");
				}
			}
		}
	}
}

// return message according to type
function getMessageType($type)
{
	if ($type == 'registered') {
		return 'success_msg';
	} else {
		return 'error_msg';
	}
}

// return message according to type
function showMessage($type)
{
	if ($type == 'error') {
		return 'Something went wrong! please try again.';
	} elseif ($type == 'registered') {
		return 'Successfully registered. Login to get started.';
	} elseif ($type == 'userNotFound') {
		return 'User not found with provided email.';
	} elseif ($type == 'passwordNotMatched') {
		return 'Provided password is wrong';
	}
}

?>
<?php include './head/index.php' ?>

<form method="post" action="" class="register_form">
	<h4 class="form_header">Login</h4>

	<input required type="email" name="email" placeholder="Your Email" /><br>
	<input required type="password" name="password" placeholder="Password" /><br>
	<p class="<?php echo getMessageType($_GET['type']) ?>"><?php echo showMessage($_GET['type']);  ?></p>
	<button type="submit" name="submit">Login</button>
</form>