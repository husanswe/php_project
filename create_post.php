<?php
    $title = "Create Post"; 
    require 'includes/header.php';
?>

<div class="container-xxl my-5 px-5 vh-100">
    
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">

        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Create post</h1>
        </div>

        <form>
            <div class="mb-3 my-5">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Post Title">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
        </form>

        <button type="button" class="btn btn-primary">Save</button>
    </div>
</div>

<?php require 'includes/footer.php'; ?>