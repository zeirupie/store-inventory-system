<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="bg-gray-100 text-gray-500 text-[1.2em]">
    <div class="flex">
        <aside class="h-screen bg-white shadow-md w-[300px]">
            <div class="p-4 relative h-full">
                <h1 class="text-xl font-bold text-blue-600">Invycat</h1>
                <nav class="mt-6">
                    <ul>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-blue-500"><i class="fa-solid fa-house mr-[10px] text-gray-600"></i>Dashboard</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-blue-500"><i class="fa-solid fa-boxes-stacked mr-[10px] text-gray-600"></i>Products</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-blue-500"><i class="fa-solid fa-square-poll-vertical mr-[10px] text-gray-600"></i>Sales</a></li>
                    </ul>
                </nav>

                <div class="hover:bg-blue-400 bg-blue-500 text-[white] absolute left-[10px] right-[10px] bottom-[20px] p-[7px_10px] rounded-lg cursor-pointer text-center"><i class="fa-solid fa-right-from-bracket mr-[10px]"></i>Logout</div>
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