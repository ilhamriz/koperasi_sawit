<h2>Edit Product</h2>

<form method="POST" action="<?= BASEURL; ?>/product/handleUpdate/<?= $data['product']['id']; ?>" enctype="multipart/form-data">
  <fieldset class="fieldset">
    <legend class="fieldset-legend">Name</legend>
    <input type="text" name="name" class="input" placeholder="Product name" value="<?= $data['product']['name']; ?>" required />
  </fieldset>

  <fieldset class="fieldset">
    <legend class="fieldset-legend">Total Quantity</legend>
    <input type="number" name="total" class="input" value="<?= $data['product']['total']; ?>" required />
  </fieldset>

  <fieldset class="fieldset">
    <legend class="fieldset-legend">Image</legend>
    <input type="file" name="image" accept="image/*" class="file-input" />
    <small>Current: <img src="<?= BASEURL; ?>/public/img/uploads/<?= $data['product']['image']; ?>" width="50" alt="Product"></small>
  </fieldset>

  <button type="submit" class="btn btn-primary">Update</button>
</form>