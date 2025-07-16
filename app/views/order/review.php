<?php
$currentStatus = $data['status'] ?? 'all';
function isActiveTab($tab, $currentStatus)
{
  return $currentStatus == $tab ? 'tab-active' : '';
}
?>

<div class="p-6 max-w-7xl mx-auto">
  <h2 class="text-2xl font-bold mb-4">Loan Requests Review</h2>

  <div class="tabs mb-6">
    <a href="<?= BASEURL; ?>/order/review" class="tab tab-bordered <?= isActiveTab('all', $currentStatus) ?>">All</a>
    <a href="<?= BASEURL; ?>/order/review/pending" class="tab tab-bordered <?= isActiveTab('pending', $currentStatus) ?>">Pending</a>
    <a href="<?= BASEURL; ?>/order/review/accepted" class="tab tab-bordered <?= isActiveTab('accepted', $currentStatus) ?>">Accepted</a>
    <a href="<?= BASEURL; ?>/order/review/rejected" class="tab tab-bordered <?= isActiveTab('rejected', $currentStatus) ?>">Rejected</a>
  </div>

  <div class="overflow-x-auto">
    <table class="table table-zebra w-full">
      <thead>
        <tr>
          <th>#</th>
          <th>User</th>
          <th>Borrow Date</th>
          <th>Return Date</th>
          <th>Status</th>
          <th>Items</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['orders'] as $i => $order): ?>
          <tr>
            <td><?= $i + 1; ?></td>
            <td><?= $order['user_name']; ?></td>
            <td><?= $order['borrow_date']; ?></td>
            <td><?= $order['return_date']; ?></td>
            <td>
              <span class="badge badge-outline badge-<?= match ($order['status']) {
                                                        'pending' => 'warning',
                                                        'accepted' => 'success',
                                                        'rejected' => 'error',
                                                        'cancelled' => 'neutral',
                                                      } ?>">
                <?= ucfirst($order['status']); ?>
              </span>
            </td>
            <td><?= $order['items']; ?></td>
            <td>
              <?php if ($order['status'] === 'pending'): ?>
                <div class="flex gap-2">
                  <form method="POST" action="<?= BASEURL; ?>/order/approve/<?= $order['id']; ?>">
                    <button class="btn btn-success btn-sm" type="submit">Accept</button>
                  </form>
                  <form method="POST" action="<?= BASEURL; ?>/order/reject/<?= $order['id']; ?>">
                    <button class="btn btn-error btn-sm" type="submit">Reject</button>
                  </form>
                </div>

              <?php elseif (in_array($order['status'], ['accepted', 'rejected'])): ?>
                <form method="POST" action="<?= BASEURL; ?>/order/undo/<?= $order['id']; ?>">
                  <button class="btn btn-warning btn-sm">Undo</button>
                </form>

              <?php else: ?>
                <span class="text-sm text-gray-500 italic">No actions</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>