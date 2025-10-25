<?php 
    ob_start();

    $title = "Blog";
    require 'includes/header.php';
    require "database.php";

    $statement = $pdo->prepare("SELECT * FROM posts");
    $statement->execute();
    $posts = $statement->fetchAll();

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["DELETE"])) {

        $post_id = $_POST["post_id"];
        $statement = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $statement->execute([$post_id]);

        $_SESSION["post-deleted"] = "Post has been deleted successfully.";

        header("Location: blog.php");
        exit;
    }

?>

        <!-- Main Content -->
        <main>
            <!-- Hero Section -->
            <section class="py-5 text-center container-fluid">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Our Blog</h1>
                        <p class="lead text-body-secondary">Something short and leading about the collection below.</p>
                        <p>
                            <a href="create_post.php" class="btn btn-primary my-2">Create Post</a>
                            <a href="index.php" class="btn btn-secondary my-2">Home Page</a>
                        </p>
                    </div>

                </div>
            </section>

            <!-- Album Grid -->
            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                    
                <?php 
                    if(isset($_SESSION["post-created"])): ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION["post-created"]; ?>
                            <?php unset($_SESSION["post-created"]); ?>
                        </div>
                <?php endif; ?>

                <?php 
                    if(isset($_SESSION["post-deleted"])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_SESSION["post-deleted"]; ?>
                            <?php unset($_SESSION["post-deleted"]); ?>
                        </div>
                <?php endif; ?>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <!-- 9 Identical Album cards) -->
                    <?php foreach($posts as $post): ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                                <div class="card-body">
                                    <a href="post.php?id=<?= $post["id"]; ?>">
                                        <h5><?= $post["title"]; ?></h5>
                                    </a>
                                    
                                    <p class="card-text"> <?= $post["body"]; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="edit_post.php?id=<?= $post['id']; ?>" class="btn btn-sm btn-outline-secondary">Edit</a>

                                            <form method="post" action="" onsubmit="return confirm('Are you sure you want to delete this post?');" style="display: inline;">
                                                <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
                                                <input type="hidden" name="DELETE">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                            </form>
                                        </div>
                                        <small class="text-body-secondary"><?= $post["created_at"]; ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <?php require 'includes/footer.php'; ?>
    </body>
</html>