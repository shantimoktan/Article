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

        // remove html special characters from category name
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);

        // check if category is already added
        if (checkIfCategoryExist($name, $conn)) {
            // cadd category
            $addQuery = "INSERT INTO category (name) values('$name')";

            if ($conn->query($addQuery) === TRUE) {
                header("Location: adminCategories.php?active=category&type=addCategory");
            } else {
                echo "Error: " . $addQuery . "<br>" . $conn->error;
            }
        } else {
            header("Location: adminCategories.php?active=category&type=addCategoryFail");
        }
    }
}
?>

<?php include('./adminArea.php'); ?>
<header>
    <h2>Add Category</h2>
    <hr>
    <br>
</header>
<main>
    <form action="" method="post">
        <label>
            Name<br />
            <input required type="text" placeholder="Category Name" name="name" />
        </label>
        <button class="submit_btn" type="submit" name="submit">Add Category</button>
    </form>

</main>
</div>
</div>
</body>

</html>