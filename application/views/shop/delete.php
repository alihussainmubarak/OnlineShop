<?php if (!$this->session->userdata('user_id')) {
show_404();
} ?>

<h1 class="header font-weight-bold"><?php echo $title; ?></h1>

<table class="table table-borderless css-serial my-4">
    <thead>
        <tr>
            <th></th>
            <th scope="col">Photo</th>
            <th scope="col">Photo name</th>
            <th colspan="2">Upload date</th>
        </tr>
    </thead>

    <?php foreach ($shop as $item) : ?>

        <tbody class="border-top border-muted">
            <tr class="border-top border-secondary">
                <td class="align-middle"></td>
                <td class="align-middle"><img id="delete_photo" src="<?php echo site_url('uploads/'. $item['image']); ?>"></td>
                <td class="align-middle"><?php echo $item['name']; ?></td>
                <td class="align-middle"></td>
                <td class="align-middle"><?php echo form_open('shop/do_delete/' . $item['id']) ?>
                    <button class="btn btn-danger btn-sm" name="delete" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <tr>
        </tbody>

    <?php endforeach; ?>

</table>
