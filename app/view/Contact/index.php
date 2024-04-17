
<h3 align="center"><?php __('contact_cont'); ?></h3></br>

    <div>
        <?php if (isset($error['error'])) : ?>
            <div class="alert alert-danger">
                <?php echo $error['error'];
                unset($error['error']); ?>
            </div>
        <?php endif; ?>
    </div>
    <div>
        <?php if (isset($error['success'])) : ?>
            <div class="alert alert-success">
                <?php echo $error['success'];
                unset($error['success']); ?>
            </div>
        <?php endif; ?>
    </div>

    <form action="contact" method="post">
        <div class="mb-3">
            <label for="name" class="form-label"><?php __('name_cont'); ?></label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"><?php __('email_cont'); ?></label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label"><?php __('text_cont'); ?></label>
            <textarea type="text" class="form-control" id="text" name="text"></textarea>
        </div></br>
        <button type="submit" class="btn btn-primary"><?php __('send'); ?></button>
    </form>

