<?php
    $title = "Create Post"; 
    require 'includes/header.php';
    require "database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $title = $_POST['title'];
        $body = $_POST['body'];

        $statement = $pdo->prepare("INSERT INTO posts (title, body) VALUES (:title, :body)");
        $statement-> execute ([
            "title" => $title,
            "body" => $body
        ]);

        $_SESSION["post-created"] = "Post created successfully.";

        header("Location: blog.php");

    }
?>


<div class="container-xxl container-fluid my-5 px-5 vh-100">
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">

        <div class="py-5">
            <h1 class="display-5 fw-bold">Create post</h1>
        </div>

        <form method="post" action="">
            <div class="mb-3 my-5">
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control" placeholder="Post Title">
            </div>
            <div class="mb-3">
                <label class="form-label">Body</label>
                <textarea name="body" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
</div>

<?php require 'includes/footer.php'; ?>