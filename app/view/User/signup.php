
<div class="row">
    <div class="col-md-6">
        <form action="/cstm_mvc_pattern/user/signup" method="post">
        <div class="mb-3 lg-5">
            <label class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="login" value="<?php echo isset($_SESSION['form_data']) ? h($_SESSION['form_data']['login']) : ''; ?>" aria-describedby="login" placeholder="Login">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="Name" value="<?php echo isset($_SESSION['form_data']) ? h($_SESSION['form_data']['name']) : ''; ?>" placeholder="Name">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="Email" value="<?php echo isset($_SESSION['form_data']) ? h($_SESSION['form_data']['email']) : ''; ?>" placeholder="Email">
        </div>
        <button type="submit" class="btn btn-primary" id="signupData" name="button">Registration</button>
        </form>
        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </div>
</div>