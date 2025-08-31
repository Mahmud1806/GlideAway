<x-app-layout>
  <div class="max-w-4xl mx-auto mt-20 bg-white p-10 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold mb-8 text-center">Create a New Blog Post</h2>

    <form action="{{ route('blogpost.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- Title -->
      <div>
        <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
        <input type="text" name="title" id="title" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Country -->
      <div>
        <label for="country" class="block text-lg font-medium text-gray-700">Country</label>
        <input type="text" name="country" id="country" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Description -->
      <div>
        <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
      </div>

      <!-- Duration -->
      <div>
        <label for="duration" class="block text-lg font-medium text-gray-700">Duration (in days)</label>
        <input type="number" name="duration" id="duration" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <!-- Rating -->
      <div>
        <label for="rating" class="block text-lg font-medium text-gray-700">Rating</label>
        <select name="rating" id="rating" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
          <option value="" disabled selected>Select a rating</option>
          <option value="1">1 - Poor</option>
          <option value="2">2 - Fair</option>
          <option value="3">3 - Good</option>
          <option value="4">4 - Very Good</option>
          <option value="5">5 - Excellent</option>
        </select>
      </div>

      <!-- Image -->
      <div>
        <label for="image" class="block text-lg font-medium text-gray-700">Trip Image</label>
        <input type="file" name="image" id="image" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" accept="image/*" required>
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">
          Create Trip
        </button>
      </div>
    </form>
  </div>
</x-app-layout>
