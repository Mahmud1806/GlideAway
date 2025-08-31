<x-app-layout>
    <div class="bg-black flex justify-center gap-[50px] p-4">
        <a class="text-white text-1xl" href="{{ route('trips') }}">Explore Trips</a>
        <a class="text-white" href="{{ route('blogposts') }}">BlogPost</a>
        <a class="text-white" href="{{ route('shop') }}">Shop</a>
        <a class="text-white" href="{{ route('recharge') }}">Recharge</a>
        <a class="text-white" href="{{ route('cart') }}">Cart</a>
        <p class="text-white">${{ number_format($balance, 2) }}</p>

    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
               <header style="" class="w-85 h-120 flex flex-col items-center">
                <div class="flex items-center bg-gray-200 w-[900px] rounded-md">
                  <div  class="p-4">  
                  <h1 class="text-3xl font-bold">🏞️ Journeys Tailored to You</h1>
                  <p class="mt-4">No cookie-cutter itineraries here. We listen, customize, and make your travel dreams real, down to the last detail.</p> 
                   <button class='bg-green-800 rounded-md p-3 mt-5'><a class="text-white" href='#'>EXPLORE TRIPS</a><button>
                </div>
                <img src="{{ asset('images/img2.jpg') }}" class="w-1/2" alt="A descriptive alt text">

                </div>
                 <div class="flex items-center w-[900px] mt-8 bg-gray-200 rounded-md">
                 
                <img src="{{ asset('images/img2.jpg') }}" class="w-1/2" alt="A descriptive alt text">
                 <div class="p-4">  
                  <h1 class="text-3xl font-bold">🏞️ Shopping is Just One Click Away</h1>
                  <p class="mt-4">Shopping Before the trip can be a hassle and that's why we provide all the items required for your trip in our website. You can buy all the items you need which will be delivered to you once you reach your destination</p> 
                <button class='bg-green-800 rounded-md p-3 mt-6'>
                    <a class="text-white" href="{{ route('trips') }}">Visit Shop</a>
                </button>
                </div>
                </div>
                   <div class="flex items-center mt-8 bg-gray-200 w-[900px] rounded-md">
                  <div  class="p-4">  
                  <h1 class="text-3xl font-bold">🛡️ Built on Trust, Driven by Reliability</h1>
                  <p class="mt-4 text-green-900">When we say "we’ve got you," we mean it. Our commitment to consistency, transparency, and dependable service ensures you’re never left guessing. Every detail handled, every promise kept—because reliability isn’t just a value, it’s our foundation.</p> 
                  <button class='bg-green-800 rounded-md p-3 mt-5'><a class="text-white" href='#'>BLOGPOST</a><button>
                </div>
                <img src="{{ asset('images/img3.jpg') }}" class="w-1/2" alt="A descriptive alt text">
                </div>
               </header>
            </div>
        </div>
    </div>
</x-app-layout>
