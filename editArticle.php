<?php
session_start();
if ($_SESSION["isAdmin"] != 'TRUE') {
    header("Location: index.php?type=onlyAdmin");
}
include('./config/index.php');

if (!empty($_SESSION["ID"])) {

    $id = $_GET['id'];
    $title;
    $content;
    $category;
    // prepare select article query
    $selectArticlQuery = "SELECT * FROM article WHERE id='$id'";
    $result = $conn->query($selectArticlQuery);
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $content = $row['content'];
        $category = $row['categoryId'];
    }
}
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        // get post data
        $title = $_POST['title'];
        $category = $_POST['category'];
        $content = htmlspecialchars($_POST['content'], ENT_QUOTES);

        // prepare insert query
        $addArticleQuery = "UPDATE article SET title='$title', content='$content', categoryId='$category' WHERE id='$id'";
        if ($conn->query($addArticleQuery) === TRUE) {
            header("Location: adminArticles.php?active=article&type=update");
        } else {
            echo "Error: " . $addQuery . "<br>" . $conn->error;
        }
    }
}
?>

<?php include('./adminArea.php'); ?>
<header>
    <h2>Edit Article</h2>
    <hr>
    <br>
</header>
<main>
    <form action="" method="post">
        <label>
            Title<br />
            <input required type="text" value="<?php echo $title; ?>" placeholder="Article Title" name="title" required />
        </label>
        <label>
            Category<br />
            <select name="category" required>
                <?php
                $selectCategoryQuery = "SELECT * FROM category";
                $result = $conn->query($selectCategoryQuery);
                $sn = 0;
                while ($row = $result->fetch_assoc()) {
                ?>
                    <option <?php echo $category == $row['id'] ? 'selected="selected"' : ''; ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php
                }
                ?>
            </select>
        </label>
        <label>
            Content<br />
            <textarea style="width:500px;" required rows="8" required type="text" placeholder="Article" name="content"><?php echo $content; ?></textarea>
        </label>
        <button class="submit_btn" type="submit" name="submit">Update Article</button>
    </form>

</main>
</div>
</div>
</body>

</html>