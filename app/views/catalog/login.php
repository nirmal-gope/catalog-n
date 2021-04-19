<?php $this->view("catalog/header", $data); ?>
<div class="container my-5">
    <h2 class="col-6 tm-text-primary">
        Login
    </h2>
    <form method="post">
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?php $this->view("catalog/footer", $data); ?>