<?php
$role = $_SESSION['user']['role'] ?? "2";
$backUrl = $role === "1" ? BASEURL . '/order/review' : BASEURL . '/order';
?>

<div class="min-h-screen bg-gray-900 text-white px-6 py-10">
  <div class="max-w-3xl mx-auto space-y-6 bg-gray-800 p-8 rounded-xl shadow">

    <!-- Back Button -->
    <a href="<?= $backUrl ?>" class="inline-block">
      <button class="btn btn-outline btn-primary">← Back</button>
    </a>

    <!-- Order Info -->
    <div>
      <h2 class="text-2xl font-bold mb-4">Order Detail</h2>
      <div class="space-y-2 text-gray-300">
        <p><strong>Borrow Date:</strong> <?= $data['order']['borrow_date']; ?></p>
        <p><strong>Return Date:</strong> <?= $data['order']['return_date']; ?></p>
        <p><strong>Status:</strong>
          <span class="badge 
            <?= $data['order']['status'] === 'accepted' ? 'badge-success' : ($data['order']['status'] === 'rejected' ? 'badge-error' : 'badge-warning') ?>">
            <?= ucfirst($data['order']['status']); ?>
          </span>
        </p>
        <p><strong>Created At:</strong> <?= $data['order']['created_at']; ?></p>
      </div>
    </div>

    <!-- Items List -->
    <div>
      <h3 class="text-xl font-semibold mt-6 mb-2">Tools Borrowed:</h3>
      <ul class="list-disc list-inside text-gray-200">
        <?php foreach ($data['items'] as $item): ?>
          <li><?= $item['name']; ?> — <?= $item['quantity']; ?> pcs</li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Delete Button (only if pending) -->
    <?php if ($data['order']['status'] === 'pending'): ?>
      <form
        method="POST"
        action="<?= BASEURL; ?>/order/delete/<?= $data['order']['id'] . "/" . $data['order']['user_id']; ?>"
        onsubmit="return confirm('Are you sure you want to delete this order?');">
        <button type="submit" class="btn btn-error w-full mt-6">Delete Order</button>
      </form>
    <?php endif; ?>

  </div>
</div>