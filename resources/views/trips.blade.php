<x-app-layout>
  <form action="{{ route('trips') }}" method="GET" class="flex justify-center items-center gap-2 p-6 bg-white rounded shadow-md">
  <input type="text" name="country" placeholder="Search by country..."
         value="{{ request('country') }}"
         class="border border-gray-300 rounded-md px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-green-500" />
  <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition">
    Search
  </button>
</form>
  <header class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 bg-gray-100">
    @foreach ($trips as $trip)
    <div class="flex flex-col justify-between bg-gray-200 w-full h-[600px] mt-6 rounded-md shadow-md overflow-hidden shadow-4xl">
      
      <!-- Trip image -->
      <img src="{{ asset('images/img1.jpg') }}" class="w-full h-48 object-cover" alt="Trip image">

      <!-- Trip content -->
      <div class="flex flex-col flex-1 px-4 py-2">
        <h1 class="text-3xl font-semibold text-green-800 text-center mt-2">{{$trip->title}}</h1>
        <p class="mt-2 text-sm text-gray-700 text-center">{{$trip->description}}</p>

        <!-- Trip details -->
        <ul class="mt-4 space-y-2 text-sm text-gray-800">
          <!-- Country -->
          <li class="flex gap-2 items-center">
            <svg class="w-6 h-6 text-green-800 fill-current" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
              <path d="M255.999,0C157.385,0,77.155,80.229,77.155,178.846c0,95.432,163.813,319.578,170.786,329.073c1.884,2.565,4.877,4.081,8.06,4.081c3.183,0,6.176-1.516,8.06-4.081c6.973-9.495,170.785-233.642,170.785-329.073C434.845,80.229,354.616,0,255.999,0z"/>
              <path d="M255.999,91.69c-48.057,0-87.155,39.098-87.155,87.155S207.942,266,255.999,266s87.154-39.098,87.154-87.154C343.155,130.788,304.057,91.69,255.999,91.69z"/>
              <path d="M137.408,178.846c0-65.392,53.2-118.591,118.591-118.591c5.523,0,10-4.478,10-10c0-5.522-4.477-10-10-10c-76.419,0-138.591,62.172-138.591,138.591c0,8.033,1.446,17.549,4.297,28.284c1.189,4.478,5.235,7.436,9.659,7.436c0.85,0,1.713-0.109,2.573-0.338c5.338-1.418,8.516-6.895,7.098-12.232C138.629,192.935,137.408,185.146,137.408,178.846z"/>
            </svg>
            <span>Country: {{$trip->country}}</span>
          </li>

          <!-- Hotel -->
          <li class="flex gap-2 items-center">
            <svg class="w-6 h-6 text-green-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 
                .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 
                1.125-1.125h2.25c.621 0 1.125.504 1.125 
                1.125V21h4.125c.621 0 1.125-.504 
                1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <span>Hotel: {{$trip->hotel}}</span>
          </li>

          <!-- Flight -->
          <li class="flex gap-2 items-center">
            <svg class="w-6 h-6 text-green-800 fill-current" viewBox="0 0 122.88 122.88" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M16.63,105.75c0.01-4.03,2.3-7.97,6.03-12.38L1.09,79.73c-1.36-0.59-1.33-1.42-0.54-2.4l4.57-3.9 
                c0.83-0.51,1.71-0.73,2.66-0.47l26.62,4.5l22.18-24.02L4.8,18.41c-1.31-0.77-1.42-1.64-0.07-2.65l7.47-5.96l67.5,18.97L99.64,7.45 
                c6.69-5.79,13.19-8.38,18.18-7.15c2.75,0.68,3.72,1.5,4.57,4.08c1.65,5.06-0.91,11.86-6.96,18.86L94.11,43.18l18.97,67.5 
                l-5.96,7.47c-1.01,1.34-1.88,1.23-2.65-0.07L69.44,73.87L45.42,96.05l4.5,26.62c0.26,0.95,0.04,1.83-0.47,2.66l-3.9,4.57 
                c-0.97,0.8-1.81,0.83-2.4-0.54L28.61,100.72C24.6,103.45,20.67,105.73,16.63,105.75z"/>
            </svg>
            <span>Flight: {{$trip->flight}}</span>
          </li>
            <li class="flex gap-2 items-center">
    <svg class="w-6 h-6 text-green-800 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M12 8V12L15 14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 
      7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"/>
    </svg>
    <span>Duration: {{$trip->duration}} days</span>
  </li>

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
    <span>Price: ${{$trip->price}}</span>
  </li>
        </ul>
      </div>

      <!-- Button -->
      <div class="px-4 pb-4">
        <a href="#" class="block text-center py-2 bg-green-700 text-white rounded hover:bg-green-800 transition duration-300">
          Book Now
        </a>
      </div>
    </div>
    @endforeach
  </header>
</x-app-layout>
