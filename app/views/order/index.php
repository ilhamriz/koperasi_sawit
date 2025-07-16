<div class="min-h-screen bg-gray-900 text-white px-6 py-10">
  <div class="max-w-6xl mx-auto space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
      <h2 class="text-2xl font-bold">Your Loan Requests</h2>
      <a href="<?= BASEURL; ?>/order/create" class="btn btn-primary">
        + New Request
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="table table-zebra w-full bg-gray-800">
        <thead class="bg-gray-700 text-gray-300">
          <tr>
            <th>#</th>
            <th>Borrow Date</th>
            <th>Return Date</th>
            <th>Status</th>
            <th>Items</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($data['orders'])) : ?>
            <?php foreach ($data['orders'] as $index => $order): ?>
              <tr class="hover:bg-gray-700 transition">
                <td><?= $index + 1; ?></td>
                <td><?= $order['borrow_date']; ?></td>
                <td><?= $order['return_date']; ?></td>
                <td>
                  <span class="badge 
                    <?= $order['status'] === 'accepted' ? 'badge-success' : ($order['status'] === 'rejected' ? 'badge-error' : 'badge-warning') ?>">
                    <?= ucfirst($order['status']); ?>
                  </span>
                </td>
                <td><?= $order['items']; ?></td>
                <td>
                  <a href="<?= BASEURL; ?>/order/detail/<?= $order['id']; ?>"
                    class="btn btn-sm btn-outline btn-primary">
                    View
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="6" class="text-center py-4 text-gray-400">
                No loan requests yet.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>