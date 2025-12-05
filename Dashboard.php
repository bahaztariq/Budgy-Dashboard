<?php
require('./db_connect.php');
include('incomes/show-incomes.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Dashboard Template</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
        /* Custom Scrollbar for cleaner look */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-black-50 text-black-800" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <aside class="flex flex-col absolute z-40 left-0 top-0 bottom-0 w-64 bg-green-500 text-white transition-transform duration-300 ease-in-out md:relative md:tranblack-x-0"
               :class="sidebarOpen ? 'tranblack-x-0' : '-tranblack-x-full'">
            
            <div class="h-16 flex items-center justify-center border-b border-black-700">
                <h1 class="text-xl font-bold tracking-wider">Budgy<span class="text-indigo-400">BOARD</span></h1>
            </div>

            <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto">
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-indigo-600 rounded-lg text-white">
                    <i class="ph ph-squares-four text-xl"></i>
                    <span class="font-medium">Overview</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-black-400 hover:text-white hover:bg-black-800 rounded-lg transition-colors">
                    <i class="ph ph-chart-line-up text-xl"></i>
                    <span class="font-medium">Incomes</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-black-400 hover:text-white hover:bg-black-800 rounded-lg transition-colors">
                    <i class="ph ph-users text-xl"></i>
                    <span class="font-medium">Expences</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-black-400 hover:text-white hover:bg-black-800 rounded-lg transition-colors">
                    <i class="ph ph-gear text-xl"></i>
                    <span class="font-medium">Settings</span>
                </a>
            </nav>

            <div class="p-4 border-t border-black-700">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Admin+User&background=6366f1&color=fff" alt="User" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-semibold">Admin User</p>
                        <p class="text-xs text-black-400">admin@example.com</p>
                    </div>
                </div>
            </div>
        </aside>

        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/50 z-30 md:hidden"></div>

        <div class="flex-1 flex flex-col h-screen overflow-hidden relative">

            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 z-20">
                <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-black-600 focus:outline-none">
                    <i class="ph ph-list text-2xl"></i>
                </button>

                <div class="hidden md:flex items-center bg-black-100 rounded-lg px-3 py-2 w-64">
                    <i class="ph ph-magnifying-glass text-black-400 text-lg"></i>
                    <input type="text" placeholder="Search..." class="bg-transparent border-none outline-none text-sm ml-2 w-full placeholder-black-400">
                </div>

                <div class="flex items-center gap-4">
                    <button class="relative p-2 text-black-500 hover:bg-black-100 rounded-full transition">
                        <i class="ph ph-bell text-xl"></i>
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-black-50 p-6">
                
                <div class="mb-6 flex w-full justify-between">
                    <div>
                    <h2 class="text-2xl font-bold text-black-800">Dashboard Overview</h2>
                    <p class="text-sm text-black-500">Welcome back, here's what's happening today.</p>
                    </div>
                    <button class="Add-revenu-btn bg-black py-2 px-4 rounded-2xl text-white cursor-pointer">+ Add Revenu</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                            <p class="text-xs text-black-500 font-medium uppercase">Total Revenue</p>
                            <?php 
                             $sql = "SELECT SUM(montant) AS TotalRevenu FROM incomes GROUP BY DATE_FORMAT(dateIn,'%Y-%m') ORDER BY DATE_FORMAT(dateIn,'%Y-%m') DESC LIMIT 1";
                             $query = mysqli_query($connect, $sql); 
                             $row = mysqli_fetch_assoc($query);
                             $sum = $row['TotalRevenu'] ?? 0; 
                             echo "<h3 class='text-2xl font-bold text-black-800'>" . number_format($sum, 2) . "</h3>";
                             ?>
                            </div>
                            <div class="p-2 bg-green-50 rounded-lg text-green-600">
                                <i class="ph ph-currency-dollar text-2xl"></i>
                            </div>
                        </div>
                        <p class="text-xs text-green-600 flex items-center gap-1">
                            <i class="ph ph-trend-up"></i> +20.1% <span class="text-black-400">from last month</span>
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <p class="text-xs text-black-500 font-medium uppercase">Active Users</p>
                                <h3 class="text-2xl font-bold text-black-800">2,345</h3>
                            </div>
                            <div class="p-2 bg-indigo-50 rounded-lg text-indigo-600">
                                <i class="ph ph-users-three text-2xl"></i>
                            </div>
                        </div>
                        <p class="text-xs text-green-600 flex items-center gap-1">
                            <i class="ph ph-trend-up"></i> +5.4% <span class="text-black-400">from last month</span>
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <p class="text-xs text-black-500 font-medium uppercase">New Orders</p>
                                <h3 class="text-2xl font-bold text-black-800">1,245</h3>
                            </div>
                            <div class="p-2 bg-orange-50 rounded-lg text-orange-600">
                                <i class="ph ph-shopping-cart text-2xl"></i>
                            </div>
                        </div>
                        <p class="text-xs text-red-500 flex items-center gap-1">
                            <i class="ph ph-trend-down"></i> -1.2% <span class="text-black-400">from last month</span>
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <p class="text-xs text-black-500 font-medium uppercase">Pending Issues</p>
                                <h3 class="text-2xl font-bold text-black-800">12</h3>
                            </div>
                            <div class="p-2 bg-red-50 rounded-lg text-red-600">
                                <i class="ph ph-warning-circle text-2xl"></i>
                            </div>
                        </div>
                        <p class="text-xs text-black-400">Requires attention</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="font-bold text-lg text-black-800 mb-4">Revenue Analytics</h3>
                        <div class="h-64 w-full bg-black-50 rounded-lg flex items-center justify-center border border-dashed border-black-300 text-black-400">
                            [ Chart.js Canvas Area ]
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="font-bold text-lg text-black-800 mb-4">Traffic Source</h3>
                        <div class="h-40 w-full bg-black-50 rounded-lg flex items-center justify-center border border-dashed border-black-300 text-black-400 mb-4">
                            [ Donut Chart Area ]
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-black-500">Direct</span>
                                <span class="font-bold">54%</span>
                            </div>
                            <div class="w-full bg-black-100 rounded-full h-2">
                                <div class="bg-indigo-600 h-2 rounded-full" style="width: 54%"></div>
                            </div>
                            
                            <div class="flex justify-between text-sm">
                                <span class="text-black-500">Referral</span>
                                <span class="font-bold">32%</span>
                            </div>
                            <div class="w-full bg-black-100 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 32%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border- border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-lg text-black-800">Recent Transactions</h3>
                        <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View All</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-black-600">
                            <thead class="bg-black-50 text-xs uppercase font-semibold text-black-500">
                                <tr>
                                    <th class="px-6 py-4">Transaction ID</th>
                                    <th class="px-6 py-4">Description</th>
                                    <th class="px-6 py-4">Date</th>
                                    <th class="px-6 py-4">Amount</th>
                                    <th class="px-6 py-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-black-100">
                                <?php
                                while($row = mysqli_fetch_assoc($result)){
                                  echo "<tr class='hover:bg-black-50 transition'>
                                   <td class='px-6 py-4 font-medium text-black-800'>#{$row['id']}</td>
                                   <td class='px-6 py-4'>
                                     <div class='flex items-center gap-3'>
                                        <span>{$row['description']}</span>
                                     </div>
                                   </td>
                                   <td class='date class='px-6 py-4'>{$row['date_']}</td>
                                   <td class='amount px-6 py-4 font-medium text-black-800'><span>{$row['montant']}</span> DH</td>
                                   <td class='px-6 py-4'>
                                   <div class='flex gap-4' >
                                    <a href='incomes/modify-income.php/?id={$row['id']}' class='text-blue-400 cursor-pointer'>
                                    <button class='btn-action btn-edit text-blue-400 cursor-pointer'><i class='fas fa-edit'></i></button>
                                  </a>
                                   <a href='incomes/Delete-income.php/?id={$row['id']}' class='text-red-400 cursor-pointer' >
                                    <button class='btn-action btn-delete text-red-400 cursor-pointer'><i class='fas fa-trash'></i></button>
                                  </a>   
                                  </div>
                                 </td>
                                 </tr>";
                                }
                                 ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="h-10"></div> </main>
        </div>
    </div>
     <div class="modal Add-revenu-form w-full h-screen bg-black/30 fixed top-0 left-0 flex justify-center items-center hidden" >
        <form action="incomes/add-income.php" method="POST" class=" relative w-full max-w-116 max-h-80 md:max-h-128 bg-white rounded-xl shadow-md px-4 py-8 flex flex-col items-center gap-4 overflow-y-auto ">
            <button class=" close-Modal-btn absolute top-2 right-4 text-3xl cursor-pointer">&times;</button>
            <h2 class="font-bold text-3xl text-black">Add Revenu</h2>
            <div class="flex flex-col w-full gap-1">
                <label for="">Montant:</label>
                <input type="text" name="montant" pattern ="[0-9]{1,}" placeholder="Enter the amount of Revenu" class=" p-2 bg-gray-200 rounded border border-gray-300" required>
            </div>
            <div class="flex flex-col w-full gap-1">
                <label for="">Date:</label>
                <input type="date" name="Date"  placeholder="Enter the amount of Revenu" class=" p-2 bg-gray-200 rounded border border-gray-300" required>
            </div>
            <div class="flex flex-col w-full gap-1">
                <label for="">Description:</label>
                <textarea name="description" id="" placeholder="Enter the Description of Revenu" class=" min-h-30 p-2 bg-gray-200 rounded border border-gray-300" required></textarea>
            </div>
            <input type="submit" value="Add Revenu" class=" w-full bg-black text-white rounded-xl p-4">
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>