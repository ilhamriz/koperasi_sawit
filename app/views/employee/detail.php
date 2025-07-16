<div class="min-h-screen flex justify-center items-start bg-gray-900 text-white px-6 py-10">
  <div class="card w-96 bg-gray-800 shadow-lg">
    <div class="card-body space-y-4">
      <h2 class="card-title text-xl font-semibold text-white">
        <?= $data['emp']['name']; ?>
      </h2>
      <p class="text-gray-300"><?= $data['emp']['email']; ?></p>

      <a
        href="<?= BASEURL; ?>/employee"
        class="btn btn-sm btn-outline btn-primary mt-4 w-full">
        ← Back to Employee List
      </a>
    </div>
  </div>
</div>