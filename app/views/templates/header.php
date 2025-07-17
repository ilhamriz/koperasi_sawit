<?php
$role = $_SESSION['user']['role'] ?? null;
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman <?= $data["title"]; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/output.css">
</head>

<body>
  <?php if (isset($_SESSION['flash'])): ?>
    <div class="toast toast-top toast-center z-10">
      <div class="alert alert-<?= $_SESSION['flash']['type']; ?>">
        <span><?= $_SESSION['flash']['message']; ?></span>
      </div>
    </div>
    <?php unset($_SESSION['flash']); ?>
  <?php endif; ?>

  <div class="drawer">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
      <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
      <ul class="menu bg-base-200 min-h-full w-80 p-4">
        <li><a class="nav-link" aria-current="page" href="<?= BASEURL; ?>/dashboard">Home</a></li>

        <!-- ONLY FOR ADMIN -->
        <?php if ($role == 1): ?>
          <li><a class="nav-link" href="<?= BASEURL; ?>/product">Product</a></li>
          <li><a class="nav-link" href="<?= BASEURL; ?>/order/review">Review</a></li>
          <li><a class="nav-link" href="<?= BASEURL; ?>/employee">Employee</a></li>
        <?php endif; ?>

        <!-- ONLY FOR EMPLOYEE -->
        <?php if ($role == 2): ?>
          <li><a class="nav-link" href="<?= BASEURL; ?>/order">Order</a></li>
        <?php endif; ?>

        <li><a class="justify-between" href="<?= BASEURL; ?>/profile">Profile</a></li>
        <li><a class="nav-link" href="<?= BASEURL; ?>/logout/handleLogout" onclick="return confirm('Are you sure you want to logout?');">Logout</a></li>
      </ul>
    </div>
    <div class="drawer-content flex flex-col">
      <!-- Navbar -->
      <?php if (isset($_SESSION['user'])): ?>
        <div class="navbar bg-base-300 w-full">
          <div class="flex-none lg:hidden">
            <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                class="inline-block h-6 w-6 stroke-current">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </label>
          </div>
          <div class="flex-1">
            <a class="mx-2 px-2" href="<?= BASEURL; ?>/dashboard">Koperasi Sawit</a>
          </div>
          <div class="hidden flex-none lg:block">
            <ul class="menu menu-horizontal">
              <li><a class="nav-link" aria-current="page" href="<?= BASEURL; ?>/dashboard">Home</a></li>

              <!-- ONLY FOR ADMIN -->
              <?php if ($role == 1): ?>
                <li><a class="nav-link" href="<?= BASEURL; ?>/product">Product</a></li>
                <li><a class="nav-link" href="<?= BASEURL; ?>/order/review">Review</a></li>
                <li><a class="nav-link" href="<?= BASEURL; ?>/employee">Employee</a></li>
              <?php endif; ?>

              <!-- ONLY FOR EMPLOYEE -->
              <?php if ($role == 2): ?>
                <li><a class="nav-link" href="<?= BASEURL; ?>/order">Order</a></li>
              <?php endif; ?>
            </ul>
            <div class="dropdown dropdown-end">
              <button type="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                  <img
                    alt="Tailwind CSS Navbar component"
                    src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                </div>
              </button>
              <ul class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a class="justify-between" href="<?= BASEURL; ?>/profile">Profile</a></li>
                <li><a class="nav-link" href="<?= BASEURL; ?>/logout/handleLogout" onclick="return confirm('Are you sure you want to logout?');">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <!-- Page content here -->