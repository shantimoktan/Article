<?php
session_start();
if ($_SESSION["isAdmin"] != 'TRUE') {
    header("Location: index.php?type=onlyAdmin");
}
include('./config/index.php');
include('./adminArea.php');

// show alert according to $_GET types
if ($_GET['type'] === 'update') {
    echo "<script>alert('Category updated successfully');</script>";
} elseif ($_GET['type'] == 'deleteSuccess') {
    echo "<script>alert('Category deleted successfully');</script>";
} elseif ($_GET['type'] == 'deleteFail') {
    echo "<script>alert('Something went wrong when deleting category');</script>";
} elseif ($_GET['type'] == 'addCategory') {
    echo "<script>alert('Category Added successfully');</script>";
} elseif ($_GET['type'] == 'addCategoryFail') {
    echo "<script>alert('Something went wrong when adding category');</script>";
}
?>
<header>
    <h2>Categories</h2>
    <hr>
    <br>
</header>
<div class="add_admin_container">
    <a href="addCategory.php"><button class="action_btn add_btn">Add Category</button></a>
</div>
<table>
    <tr>
        <th>S.N</th>
        <th>Category Name</th>
        <th>Actions</th>

    </tr>
    <?php
    if (!empty($_SESSION["ID"])) {
        // select all categories
        $selectCategoryQuery = "SELECT * FROM category";
        $result = $conn->query($selectCategoryQuery);
        $sn = 0;
        // show selected categories in table
        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><?php echo ++$sn; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td style="text-align:center;">
                    <a href="editCategory.php?active=category&id=<?php echo $row['id']; ?>"><button class="action_btn edit_btn">Edit</button></a>
                    <a href="deleteCategory.php?id=<?php echo $row['id']; ?>"><button class="action_btn delete_btn">Delete</button></a>
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