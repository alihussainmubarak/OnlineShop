<?php if (!$this->session->userdata('user_id')) {
    show_404();
} ?>

<h1 class="header font-weight-bold"> <?php echo $title; ?></h1>


<div class="border border-secondary p-3">
    <p><b>Name:</b> <?php echo $this->session->userdata['name']; ?></p>

    <p><b>Username:</b> <?php echo $this->session->userdata['username']; ?></p>

    <p><b>E-mail:</b> <?php echo $this->session->userdata['email']; ?></p>

    <p><b>Joined date:</b> <?php echo $this->session->userdata['date']; ?><hr>

    <?php echo form_open('signup/delete_user/' . $user['id']); ?>
    <input type="submit" value="Delete" class="btn btn-danger">
    </form>

</div>