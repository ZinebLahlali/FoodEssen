<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto px-6 py-10">
<form action="{{ route('edit') }}" method="POST" class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
    @csrf

    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Créer un restaurant</h2>

    <!-- Nom -->
    <div>
        <label for="nom" class="block text-gray-600 font-medium mb-1">Nom du restaurant</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('nom')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Localisation -->
    <div>
        <label for="localisation" class="block text-gray-600 font-medium mb-1">Localisation</label>
        <input type="text" name="localisation" id="localisation" value="{{ old('localisation') }}" required
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('localisation')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Type de cuisine -->
    <div>
        <label for="type_de_cuisine" class="block text-gray-600 font-medium mb-1">Type de cuisine</label>
        <input type="text" name="type_de_cuisine" id="type_de_cuisine" value="{{ old('type_de_cuisine') }}" required
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('type_de_cuisine')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Capacite -->
    <div>
        <label for="capacite" class="block text-gray-600 font-medium mb-1">Capacité</label>
        <input name="capacite" type="number" name="capacite" id="capacite" value="{{ old('capacite') }}" required
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('capacite')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Horaires -->
    <div>
        <label for="horaires" class="block text-gray-600 font-medium mb-1">Horaires</label>
        <input type="time" name="horaires" id="horaires" value="{{ old('horaires') }}" required
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('horaires')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Submit -->
    <div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition-colors">
            Créer le restaurant
        </button>
    </div>
</form>
    </main>

  

</body>
</html>

