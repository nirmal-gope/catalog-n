<?php $this->view("catalog/header", $data); ?>
<div class="container my-5">
    <h1 class="text-center my-5">Upload an Image</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Image title" required>
        </div>
        <div class="form-group">
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
<?php $this->view("catalog/footer", $data); ?>