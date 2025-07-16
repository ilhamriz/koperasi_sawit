<?php
$currentStatus = $data['status'] ?? 'all';
function isActiveTab($tab, $currentStatus)
{
  return $currentStatus == $tab ? 'tab-active' : '';
}
?>

<div class="min-h-screen bg-gray-900 text-white px-6 py-10">
  <div class="max-w-7xl mx-auto space-y-6">
    <h2 class="text-3xl font-bold">Loan Requests Review</h2>

    <!-- Tabs -->
    <div class="tabs tabs-boxed">
      <a href="<?= BASEURL; ?>/order/review" class="tab <?= isActiveTab('all', $currentStatus) ?>">All</a>
      <a href="<?= BASEURL; ?>/order/review/pending" class="tab <?= isActiveTab('pending', $currentStatus) ?>">Pending</a>
      <a href="<?= BASEURL; ?>/order/review/accepted" class="tab <?= isActiveTab('accepted', $currentStatus) ?>">Accepted</a>
      <a href="<?= BASEURL; ?>/order/review/rejected" class="tab <?= isActiveTab('rejected', $currentStatus) ?>">Rejected</a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="table table-zebra w-full">
        <thead class="text-gray-300 bg-gray-800">
          <tr>
            <th>#</th>
            <th>User</th>
            <th>Borrow Date</th>
            <th>Return Date</th>
            <th>Status</th>
            <th>Tools</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="bg-gray-800">
          <?php foreach ($data['orders'] as $i => $order): ?>
            <tr class="hover:bg-gray-700 transition">
              <td><?= $i + 1; ?></td>
              <td><?= $order['user_name']; ?></td>
              <td><?= $order['borrow_date']; ?></td>
              <td><?= $order['return_date']; ?></td>
              <td>
                <span class="badge badge-outline 
                  <?= $order['status'] === 'accepted' ? 'badge-success' : ($order['status'] === 'rejected' ? 'badge-error' : ($order['status'] === 'pending' ? 'badge-warning' : '')) ?>">
                  <?= ucfirst($order['status']); ?>
                </span>
              </td>
              <td>
                <a href="<?= BASEURL; ?>/order/detail/<?= $order['id'] . "/" . $order['user_id']; ?>" class="link link-primary">Detail</a>
              </td>
              <td class="space-x-2">
                <?php if ($order['status'] === 'pending'): ?>
                  <a href="<?= BASEURL; ?>/order/approve/<?= $order['id']; ?>" class="btn btn-success btn-sm">Accept</a>
                  <a href="<?= BASEURL; ?>/order/reject/<?= $order['id']; ?>" class="btn btn-error btn-sm">Reject</a>
                <?php else: ?>
                  <a href="<?= BASEURL; ?>/order/undo/<?= $order['id']; ?>" class="btn btn-outline btn-sm">Undo</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>