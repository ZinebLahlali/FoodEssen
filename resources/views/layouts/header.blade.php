<header class="bg-red-600 text-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo / Brand Name -->
        <h1 class="text-2xl font-bold">Delicious Bites</h1>

        <!-- Navigation -->
        <nav>
            <ul class="flex space-x-4">
                <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ url('/menu') }}" class="hover:underline">Menu</a></li>
                <li><a href="{{ url('/register') }}" class="hover:underline font-semibold">Register</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:underline">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>