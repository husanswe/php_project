<?php
    ob_start();
    
    $title = "Posts";
    require 'includes/header.php';
    require "database.php";

    $id = $_GET['id'];
    
    $statement = $pdo ->prepare("SELECT * FROM posts WHERE id = ?");
    $statement->execute([$id]);
    $post = $statement->fetch();
?>

        
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Astro v5.13.2">
        <meta name="theme-color" content="#712cf9">
        
        <title>Starter Template · Bootstrap v5.3</title>
        
        <!-- Bootstrap CSS -->
        <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/starter-template/">
        
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
        <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">

        <!-- Scripts -->
        <script src="/docs/5.3/assets/js/color-modes.js"></script>
    </head>

    <body>

        <!-- Main Content -->
        <div class="col-lg-8 mx-auto p-4 py-md-5">
            <!-- Header -->
            <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
                <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Starter template</span>
                </a>
            </header>

            <!-- Main Content Area -->
            <main>
                <h3> <?= $post["id"]; ?> </h3>
                <h1 class="text-body-emphasis"><?= $post["title"]; ?></h1>
                <p class="fs-5 col-md-8">
                    <?= $post["body"]; ?>
                </p>

                <p><?= $post["created_at"]; ?></p>
            </main>

        </div>

        <!-- Bootstrap JavaScript -->
        <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"></script>
    </body>
</html>

        <!-- Footer -->
        <?php require 'includes/footer.php'; ?>
    </body>
</html>