<?php
session_start();
if ($_SESSION["isAdmin"] != 'TRUE') {
    header("Location: index.php?type=onlyAdmin");
}
include('./config/index.php');
include('./config/utils.php');

// if its post request and submitted using submit btn
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {

        // get post data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        // check is email is already registered in database
        if (checkIfEmailExist($email, $conn)) {
            // if its a new email prepare sql query to post
            $addQuery = "INSERT INTO users (name,email,password,isAdmin) values('$name','$email','$password','TRUE')";
            if ($conn->query($addQuery) === TRUE) {
                header("Location: manageAdmins.php?active=admins&type=addAdmin");
            } else {
                echo "Error: " . $addQuery . "<br>" . $conn->error;
            }
        } else {
            header("Location: manageAdmins.php?active=admins&type=addAdminFail");
        }
    }
}
?>

<?php include('./adminArea.php'); ?>
<header>
    <h2>Add Admin</h2>
    <hr>
</header>
<main>
    <form action="" method="post">
        <label>
            Name<br />
            <input required type="text" placeholder="Your Name" name="name" />
        </label>
        <label>
            Email Address<br />
            <input required type="email" placeholder="email" name="email" />
        </label>
        <label>
            Password<br />
            <input required type="text" placeholder="password" name="password" />
        </label>
        <button class="submit_btn" type="submit" name="submit">Add Admin</button>
    </form>

</main>
</div>
</div>
</body>

</html>