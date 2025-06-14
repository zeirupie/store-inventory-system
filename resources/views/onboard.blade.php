<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <title>Sariventory</title>

    @vite(['resources/css/app.css','resources/js/store/onboard.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

</head>
<body class="bg-gray-100 text-gray-500 text-[1.2em]">
    {{-- Header --}}
    <header class="z-999 text-[#444444] absolute left-0 right-0 p-[0_100px] h-[80px] flex items-center justify-between border-b border-gray-100 ">
        <h1 class="font-bold text-[2rem] text-blue-600 flex items-center">
            <img src="{{ asset('logo.png') }}" alt="Sariventory Logo" class="h-[38px] w-[38px] mr-[10px] inline-block align-middle" />
            Sariventory
        </h1>
        <nav class="flex items-center gap-[30px] font-[700]">
            <a href="#features" class="hover:text-blue-500 transition">Features</a>
            <a href="#howitworks" class="hover:text-blue-500 transition">How it Works</a>
            <a href="#benefits" class="hover:text-blue-500 transition">Benefits</a>
            <a href="{{route('view.login')}}" class="hover:bg-blue-400 bg-blue-500 text-[white] p-[7px_20px] rounded-lg">Login</a>
        </nav>
    </header>
    {{--Hero section--}}
    <div class="z-1 flex text-[#444444] items-end h-[600px] gap-[20px] p-[0_70px] pt-[70px] overflow-hidden" style="background-image: url('hero.avif'); background-size: cover; background-position: center;">
        <div class="w-[50%] h-[550px] ml-[50px] flex flex-col justify-center pt-[50px]">
            <h1 class="font-[900] text-[2.5em]">Manage Your <span class="text-blue-500">Inventory</span> Effortlessly</h1>
            <p class="text-[1.2em] font-[600] p-[10px_0]">Track your products, monitor your income, and make smarter business decisions with ease.</p>
            <div class="mt-[10px]"><a href="{{route('view.login')}}" class="hover:bg-blue-400  text-[1.2em] bg-blue-500 text-[white] p-[10px_20px] rounded-[25px]">Get Started</a></div>
        </div>
        <img src="human-1.png" class="h-[500px]">
    </div>
    {{-- Features section--}}
    <section id="features" class="py-[90px]" data-aos="fade-up">
        <h1 class="font-[900] text-[2em] text-blue-500 text-center mb-[50px]">Features</h1>
        <div class="flex flex-wrap justify-center gap-[40px] px-[70px]">
            {{--feature 1--}}
            <div class="flex flex-col items-center bg-white rounded-xl shadow-lg p-[35px] min-w-[270px] max-w-[320px] hover:scale-105 transition">
                <div class="bg-blue-100 text-blue-600 rounded-full w-[60px] h-[60px] flex items-center justify-center text-[2em] mb-[18px] shadow">
                    <i class="fas fa-box"></i>
                </div>
                <h2 class="font-[700] text-[1.2em] mb-[10px] text-blue-700 text-center">Inventory Management</h2>
                <p class="text-center text-gray-600">Add, update, and track your product stock with an intuitive interface designed for your sari-sari store.</p>
            </div>
            {{--feature 2--}}
            <div class="flex flex-col items-center bg-white rounded-xl shadow-lg p-[35px] min-w-[270px] max-w-[320px] hover:scale-105 transition">
                <div class="bg-green-100 text-green-600 rounded-full w-[60px] h-[60px] flex items-center justify-center text-[2em] mb-[18px] shadow">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h2 class="font-[700] text-[1.2em] mb-[10px] text-green-700">Product Statistics</h2>
                <p class="text-center text-gray-600">Visualize sales trends and inventory status with dynamic charts and data at your fingertips.</p>
            </div>

            {{--feature 3--}}
            <div class="flex flex-col items-center bg-white rounded-xl shadow-lg p-[35px] min-w-[270px] max-w-[320px] hover:scale-105 transition">
                <div class="bg-yellow-100 text-yellow-600 rounded-full w-[60px] h-[60px] flex items-center justify-center text-[2em] mb-[18px] shadow">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h2 class="font-[700] text-[1.2em] mb-[10px] text-yellow-700">Income Tracking</h2>
                <p class="text-center text-gray-600">Keep tabs on daily income and optimize your store's profitability through accurate records.</p>
            </div>
        </div>
    </section>

    {{--How it works section--}}
    <section id="howitworks" class="py-[90px] bg-blue-100" data-aos="fade-up">
        <h1 class="font-[900] text-[2em] text-blue-600 text-center mb-[50px]">How it Works</h1>
        <div class="flex flex-col md:flex-row justify-center items-center gap-[40px] px-[30px] max-w-[1100px] mx-auto">
            <!-- Step 1 -->
            <div class="flex-1 flex flex-col items-center relative group">
                <div class="relative mb-[20px]">
                    <div class="bg-blue-100 rounded-full w-[110px] h-[110px] flex items-center justify-center shadow-lg border-4 border-blue-200 group-hover:scale-105 transition">
                        <i class="fas fa-plus-circle text-blue-500 text-[3em]"></i>
                    </div>
                    <span class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-blue-500 text-white px-[18px] py-[4px] rounded-full text-[1em] font-bold shadow">1</span>
                </div>
                <h2 class="font-[700] text-[1.2em] mb-[10px] text-blue-700 text-center">Add Products</h2>
                <p class="text-center text-gray-600 mb-[10px]">Quickly add new products to your inventory with just a few clicks.</p>
            </div>
            <!-- Step 2 -->
            <div class="flex-1 flex flex-col items-center relative group">
                <div class="relative mb-[20px]">
                    <div class="bg-green-100 rounded-full w-[110px] h-[110px] flex items-center justify-center shadow-lg border-4 border-green-200 group-hover:scale-105 transition">
                        <i class="fas fa-edit text-green-600 text-[3em]"></i>
                    </div>
                    <span class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-green-500 text-white px-[18px] py-[4px] rounded-full text-[1em] font-bold shadow">2</span>
                </div>
                <h2 class="font-[700] text-[1.2em] mb-[10px] text-green-700 text-center">Update & Track</h2>
                <p class="text-center text-gray-600 mb-[10px]">Update stock levels and track product movement in real time.</p>
            </div>
            <!-- Step 3 -->
            <div class="flex-1 flex flex-col items-center relative group">
                <div class="relative mb-[20px]">
                    <div class="bg-yellow-100 rounded-full w-[110px] h-[110px] flex items-center justify-center shadow-lg border-4 border-yellow-200 group-hover:scale-105 transition">
                        <i class="fas fa-chart-pie text-yellow-600 text-[3em]"></i>
                    </div>
                    <span class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-yellow-500 text-white px-[18px] py-[4px] rounded-full text-[1em] font-bold shadow">3</span>
                </div>
                <h2 class="font-[700] text-[1.2em] mb-[10px] text-yellow-700 text-center">View Insights</h2>
                <p class="text-center text-gray-600 mb-[10px]">Analyze sales and inventory trends to make informed business decisions.</p>
            </div>
        </div>
    </section>

    <!-- Benefits section -->
    <section id="benefits" class="py-[90px]" data-aos="fade-up">
        <h1 class="font-[900] text-[2em] text-green-600 text-center mb-[50px]">Benefits</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-[40px] px-[70px]">
            <!-- Benefit 1 -->
            <div class="rounded-2xl bg-gradient-to-br from-blue-100 to-blue-50 shadow-xl p-[40px] flex flex-col items-center hover:scale-105 transition border-t-4 border-blue-400">
                <div class="bg-blue-500 text-white rounded-full w-[70px] h-[70px] flex items-center justify-center text-[2.2em] mb-[18px] shadow-lg">
                    <i class="fas fa-clock"></i>
                </div>
                <h2 class="font-[700] text-[1.15em] mb-[10px] text-blue-700 text-center">Save Time</h2>
                <p class="text-center text-gray-600 mb-[10px]">Automate inventory tasks and reduce manual work so you can focus on your business.</p>
            </div>
            {{-- Benefit 2 --}}
            <div class="rounded-2xl bg-gradient-to-br from-green-100 to-green-50 shadow-xl p-[40px] flex flex-col items-center hover:scale-105 transition border-t-4 border-green-400">
                <div class="bg-green-600 text-white rounded-full w-[70px] h-[70px] flex items-center justify-center text-[2.2em] mb-[18px] shadow-lg">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h2 class="font-[700] text-[1.15em] mb-[10px] text-green-700 text-center">Increase Accuracy</h2>
                <p class="text-center text-gray-600 mb-[10px]">Minimize errors in stock management and sales tracking with reliable tools.</p>
            </div>
            {{-- Benefit 3 --}}
            <div class="rounded-2xl bg-gradient-to-br from-yellow-100 to-yellow-50 shadow-xl p-[40px] flex flex-col items-center hover:scale-105 transition border-t-4 border-yellow-400">
                <div class="bg-yellow-400 text-white rounded-full w-[70px] h-[70px] flex items-center justify-center text-[2.2em] mb-[18px] shadow-lg">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h2 class="font-[700] text-[1.15em] mb-[10px] text-yellow-700 text-center">Grow Profits</h2>
                <p class="text-center text-gray-600 mb-[10px]">Use insights and reports to optimize your inventory and boost your store’s profitability.</p>
            </div>
        </div>
    </section>
        {{--CTA section--}}
    <section id="cta" class="py-[90px] flex flex-col items-center justify-center bg-blue-500" data-aos="zoom-in">
        <h2 class="text-white font-[900] text-[2em] mb-[15px] text-center">Ready to take control of your sari-sari store?</h2>
        <p class="text-blue-100 text-[1.2em] mb-[30px] text-center max-w-[600px]">Start managing your inventory, tracking your income, and growing your business today with Sariventory.</p>
        <a href="{{route('view.login')}}" class="bg-white text-blue-600 font-bold px-[40px] py-[15px] rounded-full text-[1.2em] shadow-lg hover:bg-blue-100 transition">Get Started Now</a>
    </section>

    <footer class="bg-gray-900 text-gray-300 py-[30px] text-center text-[1em]">
        <div>
            &copy; {{ date('Y') }} Sariventory. All rights reserved.
        </div>
    </footer>
</body>
</html>