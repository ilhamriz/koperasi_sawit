<h2>Order Detail</h2>
<a href="<?= BASEURL; ?>/order">
  <button type="button" class="btn btn-primary">← Back to Orders</button>
</a>

<p><strong>Borrow Date:</strong> <?= $data['order']['borrow_date']; ?></p>
<p><strong>Return Date:</strong> <?= $data['order']['return_date']; ?></p>
<p><strong>Status:</strong> <?= ucfirst($data['order']['status']); ?></p>
<p><strong>Created At:</strong> <?= $data['order']['created_at']; ?></p>

<h3>Tools Borrowed:</h3>
<ul>
  <?php foreach ($data['items'] as $item): ?>
    <li><?= $item['name']; ?> — <?= $item['quantity']; ?> pcs</li>
  <?php endforeach; ?>
</ul>

<?php if ($data['order']['status'] === 'pending'): ?>
  <form method="POST" action="<?= BASEURL; ?>/order/delete/<?= $data['order']['id']; ?>" onsubmit="return confirm('Are you sure you want to delete this order?');">
    <button type="submit" class="btn btn-primary">Delete Order</button>
  </form>
<?php endif; ?>