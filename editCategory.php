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
        $id = $_GET['id'];
        $name = $_POST['name'];

        // check if category already exisit
        if (checkIfCategoryExist($name, $conn)) {
            $addQuery = "UPDATE category SET name='$name' WHERE id='$id'";

            if ($conn->query($addQuery) === TRUE) {
                header("Location: adminCategories.php?active=category&type=update");
            } else {
                echo "Error: " . $addQuery . "<br>" . $conn->error;
            }
        } else {
            header("Location: adminCategories.php?active=category&type=updateCategoryFail");
        }
    }
}

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $name;
    $selectCategoryQuery = "SELECT name FROM category WHERE id='$id'";
    $result = $conn->query($selectCategoryQuery);
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
    }
}
?>

<?php include('./adminArea.php'); ?>
<header>
    <h2>Edit Category</h2>
    <hr>
    <br>
</header>
<main>
    <form action="" method="post">
        <label>
            Name<br />
            <input required type="text" value="<?php echo $name; ?>" placeholder="Category Name" name="name" />
        </label>
        <button class="submit_btn" type="submit" name="submit">Update Category</button>
    </form>

</main>
</div>
</div>
</body>

</html>