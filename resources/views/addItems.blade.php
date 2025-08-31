<x-app-layout>
  <div class="max-w-4xl mx-auto mt-20 bg-white p-10 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold mb-8 text-center">Add a New Product</h2>

    <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- Product Name -->
      <div>
        <label for="name" class="block text-lg font-medium text-gray-700">Product Name</label>
        <input type="text" name="name" id="name" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Description -->
      <div>
        <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
      </div>

      <!-- Price -->
      <div>
        <label for="price" class="block text-lg font-medium text-gray-700">Price (USD)</label>
        <input type="number" name="price" id="price" step="0.01" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Image -->
      <div>
        <label for="image" class="block text-lg font-medium text-gray-700">Product Image</label>
        <input type="file" name="image" id="image" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" accept="image/*" required>
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">
          Add Product
        </button>
      </div>
    </form>
  </div>
</x-app-layout>
