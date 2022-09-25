<?php
session_start();
// if not logged in and is not admin redirect to index page
if ($_SESSION["isAdmin"] != 'TRUE') {
    header("Location: index.php?type=onlyAdmin");
}
include('./config/index.php');
// if not logged in and is not admin show alert
if ($_GET['type'] == 'onlyAdmin') {
    echo "<script>alert('Only Admin can access this page.')</script>";
}

// if its post request and submitted using submit btn
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {

        // get post data
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $category = $_POST['category'];
        $content = $_POST['content'];

        // prepare insert query
        $addArticleQuery = "INSERT INTO article(title,content,categoryId) VALUES('$title','" . htmlspecialchars($content, ENT_QUOTES) . "','$category')";
        if ($conn->query($addArticleQuery) === TRUE) {
            header("Location: adminArticles.php?active=article&type=addArticle");
        } else {
            echo "Error: " . $addQuery . "<br>" . $conn->error;
        }
    }
}
?>

<?php include('./adminArea.php'); ?>
<header>
    <h2>Add Article</h2>
    <hr>
    <br>
</header>
<main>
    <form action="" method="post">
        <label>
            Title<br />
            <input required type="text" placeholder="Article Title" name="title" required />
        </label>
        <label>
            Category<br />
            <select name="category" required>
                <?php
                // select all category and display in looped table
                $selectCategoryQuery = "SELECT * FROM category";
                $result = $conn->query($selectCategoryQuery);
                $sn = 0;
                while ($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php
                }
                ?>
            </select>
        </label>
        <label>
            Content<br />
            <textarea style="width:500px;" required rows="8" required type="text" placeholder="Article" name="content"></textarea>
        </label>
        <button class="submit_btn" type="submit" name="submit">Add Article</button>
    </form>

</main>
</div>
</div>
</body>

</html>