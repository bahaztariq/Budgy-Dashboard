<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budgy - Your Dashboard for better Money Management</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="imgs/icon.png">
    <style>
    .hero-banner{
        clip-path: polygon(0% 0%, 80% 0%, 80% 10%, 100% 10%, 100% 100%, 0% 100%, 0% 50%, 30% 50%, 30% 20%, 0% 20%);
    }
    </style>
</head>
<body class="bg-gray-100">
    <header class="fixed w-full">
        <div class="w-full p-4 flex justify-between items-center">
        <img src="imgs/logo.png" alt="" class="w-42 h-16">
        <a href="dashboard.php" class=" flex justify-center items-center bg-black text-white px-6 py-3 rounded-xl text-xl">Get Start</a>
       </div> 
    </header>
    <main class="w-full h-screen flex justify-end p-2">
        <img src="imgs/heroBanner.png" alt="" class="hero-banner rounded-xl w-1/2 h-screen ">
    </main>
    
</body>
</html>
