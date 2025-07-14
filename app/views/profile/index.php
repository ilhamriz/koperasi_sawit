<div class="w-full max-w-sm mx-auto mt-10 p-6 bg-base-100 rounded-xl shadow-md">

  <h2 class="text-2xl font-semibold mb-6 text-center">My Profile</h2>

  <?php if (!empty($_SESSION['flash_error'])): ?>
    <div class="alert alert-error mb-4">
      <span><?= $_SESSION['flash_error'];
            unset($_SESSION['flash_error']); ?></span>
    </div>
  <?php endif; ?>

  <?php if (!empty($_SESSION['flash_success'])): ?>
    <div class="alert alert-success mb-4">
      <span><?= $_SESSION['flash_success'];
            unset($_SESSION['flash_success']); ?></span>
    </div>
  <?php endif; ?>

  <form method="POST" action="<?= BASEURL; ?>/profile/update" class="space-y-4">
    <fieldset class="fieldset">
      <legend class="fieldset-legend">Name</legend>
      <input type="text" name="name" class="input" placeholder="Profile Name" value="<?= $data['user']['name']; ?>" required />
    </fieldset>

    <fieldset class="fieldset">
      <legend class="fieldset-legend">Email</legend>
      <input type="email" name="email" value="<?= $data['user']['email']; ?>" class="input" placeholder="Profile Name" required />
    </fieldset>

    <div class="form-control mt-6">
      <button type="submit" class="btn btn-primary w-full">Update</button>
    </div>
  </form>
</div>