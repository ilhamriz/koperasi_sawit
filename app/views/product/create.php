<h2>Add New Product</h2>

<form method="POST" action="<?= BASEURL; ?>/product/handleCreate" enctype="multipart/form-data">
  <fieldset class="fieldset">
    <legend class="fieldset-legend">Name</legend>
    <input type="text" name="name" class="input" placeholder="Product name" required />
  </fieldset>

  <fieldset class="fieldset">
    <legend class="fieldset-legend">Total Quantity</legend>
    <input type="number" name="total" class="input" required />
  </fieldset>

  <fieldset class="fieldset">
    <legend class="fieldset-legend">Image</legend>
    <input type="file" name="image" accept="image/*" class="file-input" required />
  </fieldset>

  <button type="submit" class="btn btn-primary">Save</button>
</form>