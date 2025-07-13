<h2>Product List</h2>
<a href="<?= BASEURL; ?>/product/create">
  <button type="button" class="btn btn-primary">
    Add New Product
  </button>
</a>
<table border="1" cellpadding="8">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Total</th>
    <th>Image</th>
    <th>Last Updated</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($data['products'] as $p): ?>
    <tr>
      <td><?= $p['id']; ?></td>
      <td><?= $p['name']; ?></td>
      <td><?= $p['total']; ?></td>
      <td>
        <img src="<?= BASEURL; ?>/img/uploads/<?= $p['image']; ?>" alt="" width="50">
      </td>
      <td><?= $p['updated_at']; ?></td>
      <td>
        <a href="<?= BASEURL; ?>/product/update/<?= $p['id']; ?>">Edit</a> |
        <a href="<?= BASEURL; ?>/product/delete/<?= $p['id']; ?>" onclick="return confirm('Delete this?')">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>