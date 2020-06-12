<?php if ($this->cart->contents()) : ?>

<table class="table table-hover table-borderless">
  <tbody>
  <?php foreach ($this->cart->contents() as $item): ?>
    <tr class="border-bottom border-light">
      <td class="align-middle"><img id="delete_photo" src="<?php echo site_url('uploads/'.$item['image']); ?>"></td>
      <td class="align-middle"><?php echo $item['name'] ?> <span class="badge badge-success"><?php echo $item['qty'] ?></span></td>
      <td class="align-middle">$ <?php echo $item['subtotal'] ?></td>
      <td class="align-middle"><a class="fa fa-trash fa-lg text-danger" href="<?php echo base_url('shop/remove/'.$item["rowid"]); ?>"></a></td>
    </tr>
    <?php endforeach;  ?>

    <tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">$<?php echo $this->cart->total(); ?></td>
</tr>
  </tbody>
</table>

  <?php else: ?>

<h2>The cart is empty</h2>

  <?php endif; ?>
