<?php if (!$this->session->userdata('user_id')) {
show_404();
} ?>

<h1 class="header font-weight-bold"><?php echo $title; ?></h1>

<div class="text-center text-danger">
    <?php 
    echo validation_errors(); 
    echo $error;
    ?>
</div>


<?php echo form_open_multipart('shop/do_upload'); ?>
<div class="form-group">
    <label>Title</label>
    <input class="form-control" type="text" name="name">
</div>
<div class="form-group">
    <label>Price</label>
    <input class="form-control" type="text" name="price">
</div>
<div class="form-group">
    <label>Upload image</label><br>
    <input class="form-control-file" type="file" name="userfile" size="20" />
</div><br>
<div class="form-group">
    <input type="submit" name="submit" class="btn btn-success" value="SUBMIT">
</div>
</form>