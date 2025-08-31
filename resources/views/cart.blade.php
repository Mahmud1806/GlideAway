<x-app-layout>
  <div class="bg-black flex justify-center gap-[50px] p-4">
        <a class="text-white text-1xl" href="{{ route('trips') }}">Explore Trips</a>
        <a class="text-white" href="{{ route('blogposts') }}">BlogPost</a>
        <a class="text-white" href="{{ route('trips') }}">Shop</a>
        <a class="text-white" href="{{ route('recharge') }}">Recharge</a>
        <a class="text-white" href="{{ route('trips') }}">Cart</a>
        <p class="text-white">${{ number_format($balance, 2) }}</p>

    </div>
<h1 class="text-4xl font-bold mt-20 text-center underline">Your Cart</h1>

@if(session('success'))
    <div class="mx-auto mt-10 w-fit bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-md" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="ml-2">{{ session('success') }}</span>
    </div>
@endif

@if(session('Error'))
    <div class="mx-auto mt-10 w-fit bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg shadow-md" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="ml-2">{{ session('Error') }}</span>
    </div>
@endif


<div class="overflow-x-auto mt-10">
  <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
    <thead class="bg-gray-100">
      <tr class="text-left text-gray-700 font-semibold">
        <th class="px-6 py-3 border-b">Type</th>
        <th class="px-6 py-3 border-b">Title</th>
        <th class="px-6 py-3 border-b">Description</th>
        <th class="px-6 py-3 border-b">Quantity</th>
        <th class="px-6 py-3 border-b">Price</th>
        <th class="px-6 py-3 border-b text-right">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)
            @php
                $details = null;
                if ($item->item_type === 'trip') {
                    $details = \App\Models\Trips::find($item->item_id);
                } elseif ($item->item_type === 'product') {
                    $details = \App\Models\Shop::find($item->item_id);
                }
            @endphp

            @if($details)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 border-b capitalize">{{ $item->item_type }}</td>
                <td class="px-6 py-4 border-b">{{ $details->title ?? $details->name }}</td>
                <td class="px-6 py-4 border-b">{{ Str::limit($details->description, 80) }}</td>
                <td class="px-6 py-4 border-b">{{ $item->quantity }}</td>
                <td class="px-6 py-4 border-b">${{ number_format($item->price, 2) }}</td>
               <td class="px-6 py-4 border-b text-right flex gap-2 justify-end">
    <!-- Pay Now Button -->
    <form action="{{ route('cart.pay', $item->id) }}" method="POST">
        @csrf
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            Pay Now
        </button>
    </form>

    <!-- Remove Button -->
    <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Remove this item from your cart?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
            Remove
        </button>
    </form>
</td>
            </tr>
            @endif
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
