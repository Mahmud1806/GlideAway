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

    <!-- Page Title -->
    <h1 class="text-center text-3xl mt-6 font-bold mb-[60px]">Welcome to the Blog Posts Page</h1>

    <!-- Intro Section -->
    <div class="mt-8 flex justify-center">
        <div class="text-center max-w-xl bg-gray-200 p-6 rounded-md">
            <h1 class="text-2xl font-bold">Why Blog Posts Matter</h1>
            <p class="mt-2">
                Blog Posts provide a great opportunity for customers to see the experiences of other customers. The purpose of this post is to build customer trust as they can leave ratings in their post about their trip experience.
            </p>
            <a href="{{ route('addblogpost') }}">
                <button class="bg-green-700 text-white font-bold px-4 py-2 mt-4 rounded-md hover:bg-green-800">
                    Add a BlogPost
                </button>
            </a>
        </div>
    </div>

    <!-- Blog Posts Section -->
    <h1 class="text-3xl font-bold text-center mt-5">ALL Blog Posts</h1>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            @foreach ($blogposts as $post)
                <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex items-center bg-gray-200 w-[900px] border border-green-500 rounded-md mx-auto">
                        <div class="p-4 w-1/2">
                            <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                            <h3 class="text-2xl font-bold">{{ $post->country }}</h3>
                            <h3 class="text-2xl font-bold flex items-center gap-2">
                                Rating: {{ $post->rating }}/5
                                <span class="text-2xl">
                                    <svg viewBox="0 0 24 24" fill="#f39c12" class="inline-block w-6 h-6">
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                    </svg>
                                </span>
                            </h3>
                            <p class="mt-4">{{ $post->description }}</p>
                            <p class="text-green-800 font-bold mt-6">Posted by: {{ $post->user->name }}</p>
                        </div>
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-1/2 h-[250px] object-cover rounded-md" alt="Trip image">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
