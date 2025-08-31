<x-app-layout>
<h1 class="text-4xl font-bold mt-20 text-center underline">Manage Blogposts</h1>

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
        <th class="px-6 py-3 border-b">Title</th>
        <th class="px-6 py-3 border-b">Country</th>
        <th class="px-6 py-3 border-b">Description</th>
        <th class="px-6 py-3 border-b">Duration</th>
        <th class="px-6 py-3 border-b">Rating</th>
        <th class="px-6 py-3 border-b">Image</th>
        <th class="px-6 py-3 border-b text-right">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($blogposts as $post)
      <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 border-b">{{ $post->title }}</td>
        <td class="px-6 py-4 border-b">{{ $post->country }}</td>
        <td class="px-6 py-4 border-b">{{ Str::limit($post->description, 80) }}</td>
        <td class="px-6 py-4 border-b">{{ $post->duration }}</td>
        <td class="px-6 py-4 border-b">{{ $post->rating }}/5</td>
        <td class="px-6 py-4 border-b">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-20 h-20 object-cover rounded">
        </td>
        <td class="px-6 py-4 border-b text-right">
          <form action="{{ route('blogpost.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blogpost?');">
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
