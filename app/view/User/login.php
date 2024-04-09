<?php if(!isset($_SESSION['user'])): ?>
<h2><?php __('login'); ?></h2>
<div class='row'>
    <div class='col-md-6'>
        <form method="post" action="login">
            <div class="form-grup">
                <lable for='login'><?php __('login_2'); ?></lable>
                <input type="text" name="login" class="form-control" id="login">
            </div>
            <div class="form-grup">
                <lable for='login'><?php __('password'); ?></lable>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-secondary"><?php __('login'); ?></button>
        </form>
    </div>
</div>
<?php endif;?>
