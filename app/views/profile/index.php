<div class="min-h-screen flex items-center justify-center bg-gray-900 text-white px-4 py-12">
  <div class="w-full max-w-sm bg-gray-800 p-6 rounded-xl shadow-lg space-y-6">

    <!-- Heading -->
    <h2 class="text-2xl font-semibold text-center">My Profile</h2>

    <!-- Flash Error -->
    <?php if (!empty($_SESSION['flash_error'])): ?>
      <div class="alert alert-error text-sm">
        <span><?= $_SESSION['flash_error'];
              unset($_SESSION['flash_error']); ?></span>
      </div>
    <?php endif; ?>

    <!-- Flash Success -->
    <?php if (!empty($_SESSION['flash_success'])): ?>
      <div class="alert alert-success text-sm">
        <span><?= $_SESSION['flash_success'];
              unset($_SESSION['flash_success']); ?></span>
      </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="POST" action="<?= BASEURL; ?>/profile/update" class="space-y-4">

      <!-- Name -->
      <div>
        <label for="name" class="block text-sm font-medium mb-1">Name</label>
        <input
          type="text"
          id="name"
          name="name"
          value="<?= $data['user']['name']; ?>"
          class="input input-bordered w-full bg-gray-700 text-white border-gray-600 placeholder-gray-400"
          placeholder="Profile Name"
          required />
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium mb-1">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          value="<?= $data['user']['email']; ?>"
          class="input input-bordered w-full bg-gray-700 text-white border-gray-600 placeholder-gray-400"
          placeholder="Email Address"
          required />
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-full mt-4">Update</button>
    </form>

  </div>
</div>