
<div class="offset-2 col-6">
    <?php
    if(isset($data->error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?=$data->error?>
        </div>
        <?php
    }
    ?>
    <h1 class="text-center">Creating your account</h1>
    <form action="/register" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email1" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
</div>
