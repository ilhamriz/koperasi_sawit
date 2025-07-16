<div class="min-h-screen bg-gray-900 text-white px-6 py-10">
  <div class="max-w-xl mx-auto bg-gray-800 p-8 rounded-xl shadow space-y-6">

    <!-- Page Heading -->
    <h2 class="text-2xl font-bold text-center">Add New Product</h2>

    <!-- Form -->
    <form method="POST" action="<?= BASEURL; ?>/product/handleCreate" enctype="multipart/form-data" class="space-y-5">

      <!-- Product Name -->
      <div>
        <label for="name" class="block mb-2 font-medium">Product Name</label>
        <input
          type="text"
          id="name"
          name="name"
          placeholder="e.g. Hammer"
          class="input input-bordered w-full bg-gray-700 text-white border-gray-600 placeholder-gray-400"
          required />
      </div>

      <!-- Total Quantity -->
      <div>
        <label for="total" class="block mb-2 font-medium">Total Quantity</label>
        <input
          type="number"
          id="total"
          name="total"
          min="1"
          placeholder="e.g. 20"
          class="input input-bordered w-full bg-gray-700 text-white border-gray-600 placeholder-gray-400"
          required />
      </div>

      <!-- Product Image -->
      <div>
        <label for="image" class="block mb-2 font-medium">Product Image</label>
        <input
          type="file"
          id="image"
          name="image"
          accept="image/*"
          class="file-input file-input-bordered w-full bg-gray-700 text-white border-gray-600"
          required />
      </div>

      <!-- Submit -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary w-full">Save Product</button>
      </div>
    </form>
  </div>
</div>