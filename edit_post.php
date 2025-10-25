<?php
    ob_start();

    $title = "Create Post"; 
    require 'includes/header.php';
    require "database.php";

    $post_id = $_GET["id"];
    $statement = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $statement->execute([$post_id]);
    $post = $statement->fetch();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["PUT"])) {
        
        $id = $_POST['post_id'];
        $title = $_POST['title'];
        $body = $_POST['body'];

        $statement = $pdo->prepare("UPDATE posts SET title = :title, body = :body WHERE id = :id");
        $statement-> execute ([
            "title" => $title,
            "body" => $body,
            "id" => $id
        ]);

        $_SESSION["post-edited"] = "Post edited successfully.";

        header("Location: blog.php");
        exit;
    }
?>


<div class="container-xxl container-fluid my-5 px-5 vh-100">
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">

        <div class="py-5">
            <h1 class="display-5 fw-bold">Edit post</h1>
        </div>

        <form method="post" action="">
            <input type="hidden" name="PUT" value="<?= $post["id"] ?>">
            <h1><?= $post["id"] ?></h1>
            <div class="mb-3 my-5">
                <label class="form-label">Title</label>
                <input name="title" type="text" value="<?= $post["title"] ?>" class="form-control" placeholder="Post Title">
            </div>
            <div class="mb-3">
                <label class="form-label">Body</label>
                <textarea name="body" class="form-control" rows="3"><?= $post["body"] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
</div>

<?php require 'includes/footer.php'; ?>