<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources,css,app.css')
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-100 text-gray-500 text-[1.2em]">

    <header class="z-999 text-[#444444] absolute left-0 right-0 p-[0_100px] h-[80px] flex items-center justify-between border-b border-gray-100">
        <h1 class="font-bold text-[2rem] text-blue-600">Invycat</h1>

        <nav class="flex items-center gap-[30px] font-[700]">
            <a href="" class="hover:text-blue-500">Features</a>
            <a href="" class="hover:text-blue-500">How it Works</a>
            <a href="" class="hover:text-blue-500">Benefits</a>
            <a href="" class="hover:text-blue-500">Testimonial</a>
            <a href="" class="hover:text-blue-500">Get Started</a>

        </nav>
    </header>

    <div class="z-1 flex text-[#444444] items-end h-[550px] gap-[20px] p-[0_70px] bg-[url('{{asset('hero.avif')}}')] bg-cover pt-[70px] overflow-hidden" >
        <div class="w-[50%] h-[550px] ml-[50px] flex flex-col justify-center pt-[100px]">
            <h1 class="font-[900] text-[2.5em]">Manage Your <span class="text-blue-500">Inventory</span> Effortlessly</h1>
            <p class="text-[1.2em] font-[600] p-[10px_0]">Track your products, monitor your income, and make smarter business decisions with ease.</p>
            <div class="mt-[10px]"><a href="" class="text-[1.2em] bg-blue-500 text-[white] p-[10px_20px] rounded-[25px]">Get Started</a></div>
        </div>

        <img src="human-1.png" class="h-[450px]">
    </div>

    <div class="p-[50px_0]">
        <h1 class="font-[900] text-[2em] text-blue-500 text-center">Features</h1>

        <div class="grid grid-cols-3 gap-[20px] p-[0_70px] mt-[30px] mb-[100px]">
            <div class="border border-gray-300 p-[30px] rounded-lg bg-[white]">
                <h2 class="font-[700] text-[1.2em] mb-[10px]">Inventory Management</h2>
                <p>Add, update, and track your product stock with an intuitive interface designed for your sari-sari store.</p>
            </div>

            <div class="border border-gray-300 p-[30px] rounded-lg bg-[white]">
                <h2 class="font-[700] text-[1.2em] mb-[10px]">Product Statistics</h2>
                <p>Visualize sales trends and inventory status with dynamic charts and data at your fingertips.</p>
            </div>

            <div class="border border-gray-300 p-[30px] rounded-lg bg-[white]">
                <h2 class="font-[700] text-[1.2em] mb-[10px]">Income Tracking</h2>
                <p>Keep tabs on daily income and optimize your store's profitability through accurate records.</p>
            </div>
        </div>
    </div>
    
</body>
</html>