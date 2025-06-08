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

    <div>
        <form action="">
            <div class="flex justify-center items-center h-screen">
                <div class="bg-white p-8 rounded-lg shadow-md w-[400px]">
                    <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">Welcome Back!</h1>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>

                    <div class="mt-[10px] text-center">Don't have an account yet? <a href="" class="text-blue-500">Register</a></div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>