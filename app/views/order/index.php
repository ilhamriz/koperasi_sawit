<!-- HALAMAN UNTUK LIST PINJAMAN SI USER -->
<h2>Your Loan Requests</h2>

<a href="<?= BASEURL; ?>/order/create">
  <button type="button" class="btn btn-primary">+ New Request</button>
</a>

<table border="1" cellpadding="8" cellspacing="0">
  <thead>
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
        <tr>
          <td><?= $index + 1; ?></td>
          <td><?= $order['borrow_date']; ?></td>
          <td><?= $order['return_date']; ?></td>
          <td><?= ucfirst($order['status']); ?></td>
          <td><?= $order['items']; ?></td>
          <td>
            <a href="<?= BASEURL; ?>/order/detail/<?= $order['id']; ?>">View</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="5">No loan requests yet.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>