<x-app-layout>
<h1 class="text-4xl font-bold mt-20 text-center underline">Manage Users</h1>
@if(session('success'))
    <div class="mx-auto mt-10 w-fit bg-green-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg shadow-md" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="ml-2">{{ session('success') }}</span>
    </div>
@endif

<div class="overflow-x-auto mt-10">
  <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
    <thead class="bg-gray-100">
      <tr class="text-left text-gray-700 font-semibold">
        <th class="px-6 py-3 border-b">ID</th>
        <th class="px-6 py-3 border-b">Name</th>
        <th class="px-6 py-3 border-b">Email</th>
        <th class="px-6 py-3 border-b">Password</th>
        <th class="px-6 py-3 border-b">Role</th>
        <th class="px-6 py-3 border-b text-right">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
      <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 border-b">{{ $user->id }}</td>
        <td class="px-6 py-4 border-b">{{ $user->name }}</td>
        <td class="px-6 py-4 border-b">{{ $user->email }}</td>
        <td class="px-6 py-4 border-b">{{ $user->password }}</td>
        <td class="px-6 py-4 border-b">{{ $user->type }}</td>
        <td class="px-6 py-4 border-b text-right">
          <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                  Delete
              </button>
          </form>

        </td>
      </tr>
        @endforeach
      <!-- Add more rows as needed -->
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