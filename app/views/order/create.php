<div class="min-h-screen bg-gray-900 text-white px-6 py-10">
  <div class="max-w-3xl mx-auto bg-gray-800 p-8 rounded-xl shadow space-y-8">
    <h2 class="text-2xl font-bold text-center">Create New Loan Request</h2>

    <form method="POST" action="<?= BASEURL; ?>/order/handleCreate" class="space-y-6">
      <!-- Borrow Date -->
      <div>
        <label class="block mb-2 font-medium">Borrow Date</label>
        <input
          type="date"
          name="borrow_date"
          class="input input-bordered w-full bg-gray-700 text-white border-gray-600 placeholder-gray-400"
          required />
      </div>

      <!-- Return Date -->
      <div>
        <label class="block mb-2 font-medium">Return Date</label>
        <input
          type="date"
          name="return_date"
          class="input input-bordered w-full bg-gray-700 text-white border-gray-600 placeholder-gray-400"
          required />
      </div>

      <!-- Tool List -->
      <div class="space-y-4">
        <label class="block mb-2 font-medium">Choose Tools to Borrow</label>
        <?php foreach ($data['products'] as $product): ?>
          <div class="flex items-center justify-between bg-gray-700 px-4 py-2 rounded-md">
            <div>
              <p class="font-semibold"><?= $product['name']; ?></p>
              <p class="text-sm text-gray-300">Available: <?= $product['total']; ?></p>
            </div>
            <input
              type="number"
              name="items[<?= $product['id']; ?>]"
              min="0"
              placeholder="Qty"
              class="input input-sm w-24 bg-gray-800 text-white border-gray-600" />
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Submit Button -->
      <div class="text-center pt-4">
        <button type="submit" class="btn btn-primary px-8">Submit Request</button>
      </div>
    </form>
  </div>
</div>