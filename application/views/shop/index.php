
<div class="row">

<?php foreach ($shop as $item):  ?>
<div class="col-md-4">
<div class="card my-3">
<img class="w-100" src="<?php echo site_url('uploads/'.$item['image']); ?>">
<div class="card-body">
<?php echo $item['name'] ?>
</div>
<div class="card-footer">

<span class="float-right">$ <?php echo $item['price'] ?></span>

<form action="shop/add" method="post" class="float-left">
<input type="hidden" name="id" value="<?php echo $item['id'] ?>">
<input type="hidden" name="image" value="<?php echo $item['image'] ?>">
<input type="hidden" name="name" value="<?php echo $item['name'] ?>">
<input type="hidden" name="price" value="<?php echo $item['price'] ?>">
<button class="btn btn-success btn-sm" type="submit">Add to cart</button>
</form>

</div>

</div>
</div>

<?php endforeach;  ?>


</div>
