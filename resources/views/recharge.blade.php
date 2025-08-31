<x-app-layout>
    <!-- Navigation Bar -->
    <div class="bg-black flex justify-center gap-[50px] p-4">
        <a class="text-white text-1xl" href="{{ route('trips') }}">Explore Trips</a>
        <a class="text-white" href="{{ route('trips') }}">Make Custom Trips</a>
        <a class="text-white" href="{{ route('blogposts') }}">BlogPost</a>
        <a class="text-white" href="{{ route('trips') }}">Shop</a>
        <a class="text-white" href="{{ route('recharge') }}">Recharge</a>
        <a class="text-white" href="{{ route('trips') }}">Cart</a>
        <p class="text-white">${{ number_format($balance, 2) }}</p>
    </div>

    <!-- Recharge Form -->
    <div class="py-12">
        <div class="max-w-xl mx-auto bg-gray-100 p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Recharge Your Account</h2>

            <form action="{{ route('recharge.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Payment Method -->
                <div>
                    <label for="method" class="block text-lg font-medium text-gray-700">Payment Method</label>
                    <select name="method" id="method" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
                        <option value="" disabled selected>Select a method</option>
                        <option value="bank">Bank</option>
                        <option value="bkash">Bkash</option>
                    </select>
                </div>

                <!-- Recharge Amount -->
                <div>
                    <label for="amount" class="block text-lg font-medium text-gray-700">Recharge Amount</label>
                    <select name="price" id="price" class="mt-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
                        <option value="" disabled selected>Select amount</option>
                        <option value="50">$50</option>
                        <option value="100">$100</option>
                        <option value="500">$500</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-green-700 text-white px-6 py-3 rounded-md hover:bg-green-800 transition">
                        Recharge Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
