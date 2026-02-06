<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6 text-xl font-bold text-gray-800 border-b">My Restaurant</div>
            <nav class="mt-6">
                <a href="#" class="block py-2 px-6 text-gray-700 hover:bg-gray-100 rounded">Dashboard</a>
                <a href="" class="block py-2 px-6 text-gray-700 hover:bg-gray-100 rounded">Ajouter un restaurant</a>
                <a href="#" class="block py-2 px-6 text-gray-700 hover:bg-gray-100 rounded">Menu</a>
                <a href="#" class="block py-2 px-6 text-gray-700 hover:bg-gray-100 rounded">Reservations</a>
                <a href="#" class="block py-2 px-6 text-gray-700 hover:bg-gray-100 rounded">Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="flex items-center justify-between bg-white shadow px-6 h-16">
                <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="w-10 h-10 rounded-full">
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 p-6 overflow-auto">
                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-gray-500 text-sm font-medium">Orders Today</h2>
                        <p class="text-2xl font-bold mt-2">24</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-gray-500 text-sm font-medium">Revenue</h2>
                        <p class="text-2xl font-bold mt-2">$1,230</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-gray-500 text-sm font-medium">New Reservations</h2>
                        <p class="text-2xl font-bold mt-2">5</p>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-gray-800 text-lg font-semibold mb-4">Recent Orders</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="px-4 py-2 text-gray-600">Order ID</th>
                                    <th class="px-4 py-2 text-gray-600">Customer</th>
                                    <th class="px-4 py-2 text-gray-600">Items</th>
                                    <th class="px-4 py-2 text-gray-600">Total</th>
                                    <th class="px-4 py-2 text-gray-600">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b">
                                    <td class="px-4 py-2">#101</td>
                                    <td class="px-4 py-2">John Doe</td>
                                    <td class="px-4 py-2">3</td>
                                    <td class="px-4 py-2">$45</td>
                                    <td class="px-4 py-2 text-green-600 font-semibold">Completed</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="px-4 py-2">#102</td>
                                    <td class="px-4 py-2">Jane Smith</td>
                                    <td class="px-4 py-2">2</td>
                                    <td class="px-4 py-2">$30</td>
                                    <td class="px-4 py-2 text-yellow-500 font-semibold">Pending</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="px-4 py-2">#103</td>
                                    <td class="px-4 py-2">Alice Johnson</td>
                                    <td class="px-4 py-2">5</td>
                                    <td class="px-4 py-2">$75</td>
                                    <td class="px-4 py-2 text-red-600 font-semibold">Cancelled</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

</body>
</html>
