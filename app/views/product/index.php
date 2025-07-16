<div class="min-h-screen bg-gray-900 text-white px-6 py-10">
  <div class="max-w-7xl mx-auto space-y-6">

    <!-- Heading + Add Button -->
    <div class="flex items-center justify-between">
      <h2 class="text-2xl font-bold">Product List</h2>
      <a href="<?= BASEURL; ?>/product/create" class="btn btn-primary">
        + Add New Product
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="table table-zebra w-full bg-gray-800">
        <thead class="bg-gray-700 text-gray-300">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Total</th>
            <th>Image</th>
            <th>Last Updated</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['products'] as $p): ?>
            <tr class="hover:bg-gray-700 transition">
              <td><?= $p['id']; ?></td>
              <td><?= $p['name']; ?></td>
              <td><?= $p['total']; ?></td>
              <td>
                <img
                  src="<?= BASEURL; ?>/public/img/uploads/<?= $p['image']; ?>"
                  alt="<?= $p['name']; ?>"
                  class="w-12 h-12 object-cover rounded-md border border-gray-600">
              </td>
              <td><?= $p['updated_at']; ?></td>
              <td class="space-x-2">
                <a
                  href="<?= BASEURL; ?>/product/update/<?= $p['id']; ?>"
                  class="btn btn-sm btn-outline btn-success">
                  Edit
                </a>
                <a
                  href="<?= BASEURL; ?>/product/delete/<?= $p['id']; ?>"
                  onclick="return confirm('Are you sure you want to delete <?= $p['name']; ?>?')"
                  class="btn btn-sm btn-outline btn-error">
                  Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>