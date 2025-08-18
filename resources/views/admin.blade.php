<x-app-layout>
  @if(session('success'))
    <div class="mx-auto mt-10 w-fit bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-md" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="ml-2">{{ session('success') }}</span>
    </div>
@endif
<h1 class="text-4xl font-bold mt-20 text-center underline">Welcome to the Admin Dashboard</h1>
<div class="grid grid-cols-3 gap-4 ml-10 mt-20 gap-y-20">
  <div class="flex flex-col items-center w-[400px] bg-gray-200 h-[500px] rounded-2xl">
    <img src="{{ asset('images/addTrip.jpg') }}" alt="Add Trip" class="w-full h-1/2" />
  <div class="p-5"><h1 class="text-3xl font-bold">Add Trips</h1>
  <p class="mt-8">As an admin you can add trips to the database. Press the button below to complete the form for our customers</p>
<a href="{{ route('add.trip') }}" class="mt-6 bg-blue-500 text-white py-2 px-4 rounded inline-block text-center">
  Add Trip
</a>

</div>
</div>
  <div class="flex flex-col items-center w-[400px] bg-gray-200 h-[500px] rounded-2xl">
    <img src="{{ asset('images/manageTrip.jpg') }}" alt="Add Trip" class="w-full h-1/2" />
  <div class="p-5"><h1 class="text-3xl font-bold">Manage Trips</h1>
  <p class="mt-8">As an admin you can customise the trips such as deleting them when necessary. Press the button below to complete the form for our customers</p>
<a href="{{ route('manage.trips') }}" class="mt-6 bg-blue-500 text-white py-2 px-4 rounded inline-block text-center">
  Manage Trip
</a>

</div>
</div>
  <div class="flex flex-col items-center w-[400px] bg-gray-200 h-[500px] rounded-2xl">
    <img src="{{ asset('images/manageUsers.jpg') }}" alt="Manage Users" class="w-full h-1/2" />
  <div class="p-5"><h1 class="text-3xl font-bold">Manage Users</h1>
  <p class="mt-8">As an admin you can manage users by editing or deleting them when necessary. Press the button below to complete the form for our customers</p>
  <a href="{{ route('manage.users') }}" class="mt-6 bg-blue-500 text-white py-2 px-4 rounded inline-block text-center">
  Manage Users
</a>
</div>
</div>
  <div class="flex flex-col items-center w-[400px] bg-gray-200 h-[500px] rounded-2xl">
    <img src="{{ asset('images/viewShop.jpg') }}" alt="View Shop" class="w-full h-1/2" />
  <div class="p-5"><h1 class="text-3xl font-bold">View Shop</h1>
  <p class="mt-8">As an admin you can view and manage the shop's inventory. Press the button below to complete the form for our customers</p>
  <button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded">View Shop</button>
</div>
</div>
  <div class="flex flex-col items-center w-[400px] bg-gray-200 h-[500px] rounded-2xl">
    <img src="{{ asset('images/addTrip.jpg') }}" alt="Add Trip" class="w-full h-1/2" />
  <div class="p-5"><h1 class="text-3xl font-bold">Add Trips</h1>
  <p class="mt-8">As an admin you can add trips to the database. Press the button below to complete the form for our customers</p>
  <button class="mt-6 bg-blue-500 text-white py-2 px-4 rounded">Add Trip</button>
</div>
</div>

  
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