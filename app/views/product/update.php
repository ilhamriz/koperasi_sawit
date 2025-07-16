<div class="min-h-screen bg-gray-900 text-white px-6 py-10">
  <div class="max-w-xl mx-auto bg-gray-800 p-8 rounded-xl shadow space-y-6">
    <!-- Back Button -->
    <a href="<?= BASEURL ?>/product" class="inline-block">
      <button class="btn btn-outline btn-primary">← Back</button>
    </a>

    <!-- Page Heading -->
    <h2 class="text-2xl font-bold text-center">Edit Product</h2>

    <!-- Form -->
    <form
      method="POST"
      action="<?= BASEURL; ?>/product/handleUpdate/<?= $data['product']['id']; ?>"
      enctype="multipart/form-data"
      class="space-y-5">

      <!-- Product Name -->
      <div>
        <label for="name" class="block mb-2 font-medium">Product Name</label>
        <input
          type="text"
          id="name"
          name="name"
          value="<?= $data['product']['name']; ?>"
          class="input input-bordered w-full bg-gray-700 text-white border-gray-600 placeholder-gray-400"
          placeholder="Product name"
          required />
      </div>

      <!-- Total Quantity -->
      <div>
        <label for="total" class="block mb-2 font-medium">Total Quantity</label>
        <input
          type="number"
          id="total"
          name="total"
          value="<?= $data['product']['total']; ?>"
          class="input input-bordered w-full bg-gray-700 text-white border-gray-600"
          required />
      </div>

      <!-- Image Upload -->
      <div>
        <label for="image" class="block mb-2 font-medium">Upload New Image (Optional)</label>
        <input
          type="file"
          id="image"
          name="image"
          accept="image/*"
          class="file-input file-input-bordered w-full bg-gray-700 text-white border-gray-600" />
        <div class="mt-3">
          <p class="text-sm text-gray-300 mb-1">Current Image:</p>
          <img
            src="<?= BASEURL; ?>/public/img/uploads/<?= $data['product']['image']; ?>"
            alt="Product Image"
            class="w-16 h-16 object-cover rounded border border-gray-600" />
        </div>
      </div>

      <!-- Submit -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary w-full">Update Product</button>
      </div>
    </form>
  </div>
</div>