<?php
    $title = "Create Post"; 
    require 'includes/header.php';
?>

<div class="container-xxl my-5 px-5 vh-100">
    
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Create post</h1>
        </div>
        <div>
            <div class="mb-3 my-5">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
    </div>

</div>

<?php require 'includes/footer.php'; ?>