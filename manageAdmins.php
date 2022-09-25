<?php
session_start();
if ($_SESSION["isAdmin"] != 'TRUE') {
    header("Location: index.php?type=onlyAdmin");
}
include('./config/index.php');
include('./adminArea.php');

// show alert according to $_GET tpes
if ($_GET['type'] === 'update') {
    echo "<script>alert('Admin updated successfully');</script>";
} elseif ($_GET['type'] == 'deleteSuccess') {
    echo "<script>alert('Admin deleted successfully');</script>";
} elseif ($_GET['type'] == 'deleteFail') {
    echo "<script>alert('Something went wrong when deleting admin');</script>";
} elseif ($_GET['type'] == 'addAdmin') {
    echo "<script>alert('Admin Added successfully');</script>";
} elseif ($_GET['type'] == 'addAdminFail') {
    echo "<script>alert('Something went wrong when adding admin');</script>";
}
?>
<header>
    <h2>Manage Admin</h2>
    <hr>
    <br>
</header>
<div class="add_admin_container">
    <a href="addAdmin.php"><button class="action_btn add_btn">Add Admin</button></a>
</div>
<table>
    <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php
    if (!empty($_SESSION["ID"])) {
        // if logged get admin users
        $selectEmailQuery = "SELECT * FROM users WHERE isAdmin='TRUE'";
        $result = $conn->query($selectEmailQuery);
        $sn = 0;
        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><?php echo ++$sn; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td style="text-align:center;">
                    <a href="editAdmin.php?active=admins&id=<?php echo $row['id']; ?>"><button class="action_btn edit_btn">Edit</button></a>
                    <a href="deleteAdmin.php?id=<?php echo $row['id']; ?>"><button class="action_btn delete_btn">Delete</button></a>
                </td>
            </tr>
    <?php
        }
    } else {
        header("Location: index.php?type=loginAgain");
    }
    ?>
</table>
</div>
</div>
</body>

</html>