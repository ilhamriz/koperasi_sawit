<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <form action="<?= BASEURL; ?>/login/handleLogin" method="POST" class="bg-white p-6 rounded shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
    <input type="email" name="email" placeholder="Email" class="input input-bordered w-full mb-4" required />
    <input type="password" name="password" placeholder="Password" class="input input-bordered w-full mb-4" required />
    <button type="submit" class="btn btn-primary w-full">Login</button>
  </form>

  <a class="btn btn-sm btn-primary" href="<?= BASEURL; ?>/register">Register</a>
</div>