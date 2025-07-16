<div class="min-h-screen bg-gray-900 text-white px-6 py-10">
  <div class="max-w-2xl mx-auto">
    <h3 class="text-2xl font-bold mb-6">Daftar Employee</h3>

    <ul class="space-y-4">
      <?php foreach ($data['list_employee'] as $emp) : ?>
        <li class="flex justify-between items-center bg-gray-800 px-4 py-3 rounded-lg shadow hover:bg-gray-700 transition">
          <span class="text-lg"><?= $emp['name'] ?></span>
          <a
            href="<?= BASEURL; ?>/employee/detail/<?= $emp['id']; ?>"
            class="btn btn-sm btn-primary">
            Detail
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>