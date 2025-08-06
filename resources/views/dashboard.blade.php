<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
               <header style="" class="w-85 h-120 flex flex-col items-center">
                <div class="flex items-center bg-gray-200 w-[900px] rounded-md">
                  <div  class="p-4">  
                  <h1 class="text-3xl font-bold">🌍 Wander With Purpose</h1>
                  <p class="mt-4">Every trip tells a story. Let us help you write yours—through immersive experiences, cultural gems, and unforgettable moments.</p> 
                   <button class='bg-green-800 rounded-md p-3 mt-5'><a class="text-white" href='#'>PLAN YOUR OWN TRIP</a><button>
                </div>
                <img src="{{ asset('images/img1.jpg') }}" class="w-1/2" alt="A descriptive alt text">

                </div>
                 <div class="flex items-center w-[900px] mt-8 bg-gray-200 rounded-md">
                 
                <img src="{{ asset('images/img2.jpg') }}" class="w-1/2" alt="A descriptive alt text">
                 <div class="p-4">  
                  <h1 class="text-3xl font-bold">🏞️ Journeys Tailored to You</h1>
                  <p class="mt-4">No cookie-cutter itineraries here. We listen, customize, and make your travel dreams real, down to the last detail.</p> 
                <button class='bg-green-800 rounded-md p-3 mt-6'>
                    <a class="text-white" href="{{ route('trips') }}">PRE-MADE TRIPS</a>
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
