<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store Inventory System</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite([
        'resources/css/app.css',
        'resources/js/store/product.js',
        'resources/js/store/dashboard.js',
    ])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">


</head>
<body class="bg-gray-100 text-gray-500 text-[1.2em]">
    <div class="flex">
        <aside class="h-screen bg-white shadow-md w-[300px]">
            <div class="p-4 relative h-full">
                <h1 class="text-xl font-bold text-blue-600 text-center text-[1.3em] flex items-center justify-center">
                    <img src="{{ asset('logo.png') }}" alt="Sariventory Logo" class="h-[38px] w-[38px] mr-[10px] inline-block align-middle" />
                    Sariventory
                </h1>
                <div class="bg-blue-50 h-[80px] p-3 rounded-lg mt-[10px] flex items-center">
                    <i class="fas fa-store mr-[10px] text-[1.5em]"></i>
                    <h2 class="font-[650] text-[0.8em]">
                        {{ isset($owner_name) ? $owner_name : 'Store name' }}
                    </h2>  
                </div>

                <nav class="mt-6 border-t border-gray-300 pt-[20px]">
                    <ul>
                        <a href="{{route('store.dashboard')}}" >
                            <li class="hover:bg-blue-100 hover:text-blue-500 mb-2 rounded-lg {{ Route::currentRouteName() == 'store.dashboard' ? 'bg-blue-100 text-blue-500' : 'bg-[white]' }} p-[7px_10px]">
                                <i class="fa-solid fa-house mr-[10px]"></i>Dashboard
                            </li>
                        </a>
                        <a href="{{route('store.product')}}" >
                            <li class="hover:bg-blue-100 hover:text-blue-500 rounded-lg mb-2 {{ Route::currentRouteName() == 'store.product' ? 'bg-blue-100 text-blue-500' : 'bg-[white]' }} p-[7px_10px]">
                                <i class="fa-solid fa-boxes-stacked mr-[10px]"></i>Products
                            </li>
                        </a>
                        <a href="{{route('solds')}}" >
                            <li class="hover:bg-blue-100 hover:text-blue-500 mb-2 rounded-lg {{ Route::currentRouteName() == 'solds' ? 'bg-blue-100 text-blue-500' : 'bg-[white]' }} p-[7px_10px]">
                                <i class="fa-solid fa-square-poll-vertical mr-[10px]"></i>Solds
                            </li>
                        </a>
                        <a href="{{route('store.logs')}}" >
                            <li class="hover:bg-blue-100 hover:text-blue-500 mb-2 rounded-lg {{ Route::currentRouteName() == 'store.logs' ? 'bg-blue-100 text-blue-500' : 'bg-[white]' }} p-[7px_10px]">
                                <i class="fas fa-clock mr-[10px]"></i>Logs
                            </li>
                        </a>
                    </ul>
                </nav>

                <a href="{{route('logout')}}"><div class="hover:bg-blue-400 bg-blue-500 text-[white] absolute left-[10px] right-[10px] bottom-[20px] p-[7px_10px] rounded-lg cursor-pointer text-center"><i class="fa-solid fa-right-from-bracket mr-[10px]"></i>Logout</div></a>
            </div>


        </aside>

        <div class="p-[30px] pt-[10px] w-full h-screen overflow-y-scroll">
            <main class="w-full h-screen">
                @yield("content")
            </main>
        </div>
    </div>


</body>
</html>