<x-app-layout>
<h1 class="text-4xl font-bold mt-20 text-center underline">Manage Shop Items</h1>

@if(session('success'))
    <div class="mx-auto mt-10 w-fit bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-md" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="ml-2">{{ session('success') }}</span>
    </div>
@endif

<div class="overflow-x-auto mt-10">
  <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
    <thead class="bg-gray-100">
      <tr class="text-left text-gray-700 font-semibold">
        <th class="px-6 py-3 border-b">Image</th>
        <th class="px-6 py-3 border-b">Name</th>
        <th class="px-6 py-3 border-b">Description</th>
        <th class="px-6 py-3 border-b">Price</th>
        <th class="px-6 py-3 border-b text-right">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
      <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 border-b">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded">
        </td>
        <td class="px-6 py-4 border-b">{{ $product->name }}</td>
        <td class="px-6 py-4 border-b">{{ $product->description }}</td>
        <td class="px-6 py-4 border-b">${{ number_format($product->price, 2) }}</td>
        <td class="px-6 py-4 border-b text-right">
          <form action="{{ route('shop.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                  Delete
              </button>
          </form>
        </td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>

@if(session('success'))
    <script>
        setTimeout(() => {
            const alert = document.querySelector('[role="alert"]');
            if (alert) alert.remove();
        }, 4000);
    </script>
@endif
</x-app-layout>
