<div class="min-h-screen flex items-center justify-center bg-gray-900 px-4">
  <form
    action="<?= BASEURL; ?>/login/handleLogin"
    method="POST"
    class="bg-gray-800 text-white p-8 rounded-xl shadow-2xl w-full max-w-md space-y-6">

    <div class="text-center">
      <h2 class="text-3xl font-bold">Welcome Back 👋</h2>
      <p class="text-sm text-gray-400">Login to continue</p>
    </div>

    <input
      type="email"
      name="email"
      placeholder="Email"
      class="input input-bordered w-full bg-gray-700 text-white placeholder-gray-400 border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary"
      required />

    <div class="relative">
      <input
        id="password"
        type="password"
        name="password"
        placeholder="Password"
        class="input input-bordered w-full bg-gray-700 text-white placeholder-gray-400 border-gray-600 pr-12 focus:outline-none focus:ring-2 focus:ring-primary"
        required />
      <button
        type="button"
        onclick="togglePassword()"
        class="absolute inset-y-0 right-3 flex items-center cursor-pointer"
        tabindex="-1"
        aria-label="Toggle password visibility">
        <!-- Eye Icon -->
        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-white transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>

        <!-- Eye Slash Icon -->
        <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-white transition hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.132-3.368m3.011-2.39A9.964 9.964 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.965 9.965 0 01-4.11 5.225M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 3l18 18" />
        </svg>
      </button>
    </div>

    <button
      type="submit"
      class="btn btn-primary w-full hover:scale-[1.02] transition-transform">
      Login
    </button>

    <p class="text-center text-sm text-gray-400">
      Don't have an account?
      <a href="<?= BASEURL; ?>/register" class="text-primary font-semibold hover:underline">Register</a>
    </p>
  </form>
</div>

<!-- JS: Show/Hide Password -->
<script>
  function togglePassword() {
    const password = document.getElementById("password");
    const eye = document.getElementById("eyeIcon");
    const eyeSlash = document.getElementById("eyeSlashIcon");

    const isHidden = password.type === "password";
    password.type = isHidden ? "text" : "password";

    eye.classList.toggle("hidden", isHidden);
    eyeSlash.classList.toggle("hidden", !isHidden);
  }
</script>