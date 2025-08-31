<x-app-layout>
      <div class="bg-black flex justify-center gap-[50px] p-4">
        <a class="text-white text-1xl" href="{{ route('trips') }}">Explore Trips</a>
        <a class="text-white" href="{{ route('blogposts') }}">BlogPost</a>
        <a class="text-white" href="{{ route('trips') }}">Shop</a>
        <a class="text-white" href="{{ route('recharge') }}">Recharge</a>
        <a class="text-white" href="{{ route('cart') }}">Cart</a>
        <p class="text-white">${{ number_format($balance, 2) }}</p>

    </div>
  <header class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 bg-gray-100">
    @foreach ($products as $product)
    <div class="flex flex-col justify-between bg-gray-200 w-full h-[600px] mt-6 rounded-md shadow-md overflow-hidden shadow-4xl">
      
      <!-- Product image -->
      <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-72 object-cover" alt="Product image">

      <!-- Product content -->
      <div class="flex flex-col flex-1 px-4 py-2">
        <h1 class="text-3xl font-semibold text-green-800 text-center mt-2">{{ $product->name }}</h1>
        <p class="mt-2 text-[18px] text-gray-700 text-center">{{ $product->description }}</p>

        <!-- Product details -->
        <ul class="mt-4 space-y-2 text-sm text-gray-800">
          <!-- Price -->
          <li class="flex gap-2 items-center">
            <svg class="w-6 h-6 text-green-800 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 2C5.582 2 2 5.582 2 10s3.582 8 8 8 8-3.582 
              8-8-3.582-8-8-8zm1 12h-2v-1h2v1zm1.07-4.75c-.23.248-.54.457-.92.63-.4.186-.68.374-.83.56-.15.186-.23.433-.23.74h-2c0-.5.112-.923.335-1.27.223-.35.592-.656 
              1.105-.92.362-.184.645-.387.85-.61.205-.223.308-.483.308-.78 
              0-.437-.15-.787-.45-1.05-.3-.263-.688-.395-1.165-.395-.478 
              0-.873.132-1.185.396-.312.265-.497.633-.555 1.105l-2-.25c.11-.913.497-1.648 
              1.16-2.205.663-.558 1.498-.837 2.505-.837s1.74.22 2.34.66c.6.44.9 1.104.9 
              1.99 0 .53-.116.99-.35 1.37z"/>
            </svg>
            <span><p class="text-green-800 text-[22px]" >Price: ${{ $product->price }}</p></span>
          </li>
        </ul>
      </div>

      <!-- Add to Cart Button -->
      <div class="px-4 pb-4">
        <form action="{{ route('cart.store') }}" method="POST">
          @csrf
          <input type="hidden" name="item_type" value="product">
          <input type="hidden" name="item_id" value="{{ $product->id }}">
          <input type="hidden" name="price" value="{{ $product->price }}">
          <input type="hidden" name="quantity" value="1">

          <button type="submit" class="w-full py-2 bg-green-700 text-white rounded hover:bg-green-800 transition duration-300">
              Add to Cart
          </button>
        </form>
      </div>
    </div>
    @endforeach
  </header>
</x-app-layout>
