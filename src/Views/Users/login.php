
<div class="offset-2 col-6">
    <?php
    if(isset($data->error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?=$data->error?>
        </div>
        <?php
    }
    ?>
    <?php
    if(isset($data->success)) { ?>
        <div class="alert alert-success" role="alert">
            <?=$data->success?>
        </div>
        <?php
    }
    ?>
    <form action="/login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email1" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>
</div>
