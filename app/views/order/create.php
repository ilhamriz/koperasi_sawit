<h2>Create New Loan Request</h2>

<form method="POST" action="<?= BASEURL; ?>/order/handleCreate">
  <fieldset class="fieldset">
    <legend class="fieldset-legend">Borrow Date</legend>
    <input type="date" name="borrow_date" class="input" required />
  </fieldset>

  <!-- TODO: TANGGAL RETURN MINIMAL DARI TANGGAL PINJAM -->
  <fieldset class="fieldset">
    <legend class="fieldset-legend">Return Date</legend>
    <input type="date" name="return_date" class="input" required />
  </fieldset>

  <label>Choose Tools to Borrow:</label><br>
  <?php foreach ($data['products'] as $product): ?>
    <div>
      <label><?= $product['name']; ?> (Available: <?= $product['total']; ?>)</label>
      <input type="number" name="items[<?= $product['id']; ?>]" min="0" placeholder="Qty">
    </div>
  <?php endforeach; ?>

  <br>
  <button type="submit" class="btn btn-primary">Submit Request</button>
</form>