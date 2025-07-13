<div class="px-20">
  <h3>Daftar Employee</h3>

  <ul class="list max-w-[500px]">
    <?php foreach ($data['list_employee'] as $emp) : ?>
      <li class="list-row flex justify-between items-center">
        <span><?= $emp['name'] ?></span>
        <a href="<?= BASEURL; ?>/employee/detail/<?= $emp['id']; ?>" class="badge badge-soft badge-primary">detail</a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>