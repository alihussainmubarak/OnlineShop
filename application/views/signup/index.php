<?php echo form_open('signup'); ?>

<div class="form-group">
    <label>Name</label>
    <input class="form-control" type="text" name="name" />
    <div class="text-danger"><?php echo form_error('name'); ?></div>
</div>

<div class="form-group">
    <label for="name">E-mail</label>
    <input class="form-control" type="text" name="email" />
    <div class="text-danger"><?php echo form_error('email'); ?></div>
</div>

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

<div class="form-group">
    <label for="name">Repeat the password</label>
    <input class="form-control" type="password" name="repeat_password" />
</div>

<input class="btn btn-success" type="submit" name="submit" value="Signup" />

<div class="float-right h5">
    <a href="<?php base_url(); ?>login">Login here</a>
</div>

<?php echo form_close(); ?>