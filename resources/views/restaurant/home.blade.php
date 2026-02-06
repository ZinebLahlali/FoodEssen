<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Dining Guide</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 antialiased">

    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-2 group cursor-pointer">
                    <div class="bg-rose-600 p-2 rounded-xl group-hover:rotate-12 transition-transform">
                        <span class="text-white text-xl">🍽️</span>
                    </div>
                    <span class="text-2xl font-bold tracking-tight">Fine<span class="text-rose-600">Dine</span></span>
                </div>

                <form method="GET" action="{{ route('home') }}" class="flex flex-wrap md:flex-nowrap items-center bg-white border border-slate-200 shadow-sm rounded-2xl p-1.5 w-full max-w-2xl">
                    <div class="flex-1 px-4 py-2 border-r border-slate-100">
                        <label class="block text-[10px] uppercase font-bold text-slate-400">Location</label>
                        <input type="text" name="search" placeholder="Which city?" value="{{ request('search') }}"
                            class="w-full bg-transparent focus:outline-none text-sm font-medium placeholder:text-slate-300">
                    </div>
                  
 
                    <!-- <div class="px-4 py-2">
                        <label class="block text-[10px] uppercase font-bold text-slate-400">Limit</label>
                        <select name="per_page" class="bg-transparent focus:outline-none text-sm font-medium cursor-pointer">
                            <option value="4" {{ request('per_page') == 4 ? 'selected' : '' }}>4</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        </select>
                    </div>  -->

                    <!-- <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white p-3 rounded-xl transition-all shadow-lg shadow-rose-200 active:scale-95">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button> -->
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold mb-8">Featured Restaurants</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($restau as $rest)
            <div class="group bg-white rounded-[2rem] border border-slate-100 overflow-hidden hover:shadow-2xl hover:shadow-slate-200/50 transition-all duration-500">
                <div class="h-52 bg-slate-100 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 opacity-90" 
                         alt="Restaurant">
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-bold text-rose-600 shadow-sm uppercase tracking-wider">
                            {{ $rest->type_de_cuisine }}
                        </span>
                    </div>
                   
                </div>

                <div class="p-8">
                    <h3 class="text-2xl font-bold text-slate-800 mb-2 group-hover:text-rose-600 transition-colors">
                        {{ $rest->nom ?? 'The Gourmet Table' }}
                    </h3>
                    
                    <div class="flex items-center gap-2 mb-6">
                        <span class="text-rose-500 text-lg italic">📍</span>
                        <a href="{{ $rest->localisation }}" target="_blank" class="text-sm text-slate-500 hover:underline truncate">
                            {{ $rest->localisation }}
                        </a>
                    </div>

                    <div class="grid grid-cols-2 gap-4 py-6 border-y border-slate-50">
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase">Capacity</p>
                            <div class="flex items-center gap-1.5">
                                <span class="text-sm font-semibold">{{ $rest->capacite }} Guests</span>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] font-black text-slate-400 uppercase">Opening Hours</p>
                            <div class="flex items-center gap-1.5">
                                <span class="text-sm font-semibold">{{ $rest->horaires }}</span>
                            </div>
                        </div>
                    </div>
                     <div>
                        <form method="POST" action="{{route('restaurant.favorite', $rest) }}">
                            @csrf
                            <button>like</button>
                        </form>

                        <form method="POST" action="{{ route('restaurant.unfavorite', $rest)}}">
                            @csrf
                            @method('DELETE')
                            <button>dislike</button>
                        </form>

                    </div>

                    <div class="mt-8 flex items-center justify-between">
                        <button class="flex-1 bg-slate-900 text-white py-4 rounded-2xl font-bold hover:bg-rose-600 transition-all shadow-md active:scale-95">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-bold text-slate-400">No restaurants found...</h3>
                <p class="text-slate-400">Try adjusting your filters or searching a different city.</p>
            </div>
            @endforelse
        </div>

    </main>

    <footer class="py-12 border-t border-slate-100 text-center">
        <p class="text-slate-400 text-sm">© 2026 FineDine Platform. All rights reserved.</p>
    </footer>

</body>
</html>