<?php
include './config/index.php';
include './head/index.php';
// if its post request and submitted using submit btn
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_SESSION["name"];
        $id = $_GET['id'];
        $comment = $_POST['commentText'];

        // Insert comment
        $addCommentQuery = "INSERT INTO comment(articleId, commentBy,comment) VALUES('$id','$name','$comment')";
        if ($conn->query($addCommentQuery) === TRUE) {
            header('Location: ' . $_SERVER['REQUEST_URI']);
        } else {
            echo "Error: " . $addQuery . "<br>" . $conn->error;
        }
    }
}
?>
<img src="" />
<main class="wrapper">
    <?php
    $id = $_GET['id'];
    $selectArticlQuery = "SELECT * FROM article WHERE id='$id'";
    $result = $conn->query($selectArticlQuery);
    while ($row = $result->fetch_assoc()) {
    ?>
        <section class="hero">
            <h3><?php echo $row['title']; ?></h3>
            </article>
        </section>
        <section class="article">
            <p class="article_p"><?php echo $row['content']; ?></p>
        </section>

    <?php } ?>
    <div class="comment_section">
        <form action="" method="post">
            <div>
                <textarea placeholder="Leave your comment" name="commentText"></textarea>
                <button type="submit" name="submit" class="comment_btn">Submit</button>
            </div>
        </form>
        <?php
        if (!empty($_SESSION["ID"])) {
        ?>
            <div class="comments">
                <?php
                $id = $_GET['id'];
                $selectArticlQuery = "SELECT * FROM comment WHERE articleId='$id'";
                $result = $conn->query($selectArticlQuery);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="comment">
                        <p class="by">Comment by: <?php echo $row['commentBy'] ?></p>
                        <p><?php echo $row['comment'] ?></p>
                    </div>
                    <hr>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
        ?>
            <p>Please login to view comments.</p>
        <?
        }
        ?>

    </div>
</main>

<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>