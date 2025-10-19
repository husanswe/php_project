<?php
    $title = "Create Post"; 
    require 'includes/header.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump($_POST);
    }
?>

<div class="container-xxl container-fluid my-5 px-5 vh-100">
    
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">

        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Create post</h1>
        </div>

        <form method="post" action="">
            <div class="mb-3 my-5">
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control" placeholder="Post Title">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="3"></textarea>
            </div>
        </form>

        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>

<?php require 'includes/footer.php'; ?>