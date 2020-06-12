<div class="text-danger text-center">
    <?php
    echo $this->session->flashdata('invalid_login');
    echo $this->session->flashdata('logout');
    ?>
</div>

<div class="text-success text-center">
    <?php echo $this->session->flashdata('signed_up'); ?>
</div>

<?php echo form_open('login'); ?>

<div class="form-group">
    <label>Username</label>
    <input class="form-control" type="text" name="username" />
    <div class="text-danger"><?php echo form_error('username'); ?></div>
</div>

<div class="form-group">
    <label for="name">Password</label>
    <input class="form-control" type="password" name="password" />
    <div class="text-danger"><?php echo form_error('password'); ?></div>
</div>

<input class="btn btn-success" type="submit" name="submit" value="Login" />

<div class="float-right h5">
    <a href="<?php base_url(); ?>signup">Signup here</a>
</div>

<?php echo form_close(); ?>