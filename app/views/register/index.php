<div class="min-h-screen flex items-center justify-center bg-gray-100">
  <form method="POST" action="<?= BASEURL; ?>/register/handleRegister" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

    <input type="text" name="name" placeholder="Name" class="input input-bordered w-full mb-4" required />
    <input type="email" name="email" placeholder="Email" class="input input-bordered w-full mb-4" required />
    <input type="password" name="password" placeholder="Password" class="input input-bordered w-full mb-4" required />

    <button type="submit" class="btn btn-primary w-full">Register</button>
    <p class="text-center text-sm mt-4">Already have an account? <a href="<?= BASEURL; ?>/login" class="text-blue-500">Login</a></p>
  </form>
</div>