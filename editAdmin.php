<?php
session_start();
if ($_SESSION["isAdmin"] != 'TRUE') {
    header("Location: index.php?type=onlyAdmin");
}
include('./config/index.php');
// if its post request and submitted using submit btn
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $updateAdmin;

        // check if password is empty
        if (empty($password)) {
            $updateAdmin = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";
        } else {
            // hash using md5 and update user
            $hashPassword = md5($password);
            $updateAdmin = "UPDATE users SET name='$name', email='$email', password='$hashPassword'  WHERE id='$id'";
        }
        if ($conn->query($updateAdmin) === TRUE) {
            header("Location: manageAdmins.php?active=admins&type=update");
        } else {
            echo $conn->error;
        }
    }
}
// if there is user id select from databse and show
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $name;
    $email;
    $password;
    $selectAdminQuery = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($selectAdminQuery);
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
    }
}
?>

<?php include('./adminArea.php'); ?>
<header>
    <h2>Edit Admin</h2>
    <hr>
</header>
<main>
    <form action="" method="post">
        <label>
            Name<br />
            <input type="text" value="<?php echo $name; ?>" placeholder="Your Name" name="name" />
        </label>
        <label>
            Email Address<br />
            <input type="email" value="<?php echo $email; ?>" placeholder="email" name="email" />
        </label>
        <label>
            Password<br />
            <input type="text" placeholder="password" name="password" />
        </label>
        <button class="submit_btn" type="submit" name="submit">Update</button>
    </form>

</main>
</div>
</div>
</body>

</html>