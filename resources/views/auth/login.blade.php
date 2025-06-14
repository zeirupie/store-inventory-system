<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    
    @vite('resources/css/app.css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body class="bg-gray-100 text-gray-500 text-[1.2em]" style="background-image: url('{{ asset('bg.jpg') }}'); background-size: cover; background-position: center; background-color: rgba(0,0,0,0.5);background-blend-mode: overlay;">
    
    <div class="bg-red-500 text-white max-w-3xl mx-auto px-10 my-[50px] rounded-2xl">
        <ul class="flex flex-col">
            @foreach ($errors->all() as $error)
            <li class="list-disc py-[2px]">{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <form action="{{route('post.login')}}" method="POST">
            @csrf
            <div class="flex justify-center">
                <div class="bg-white p-8 rounded-lg shadow-md w-[400px]">
                    <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">Welcome Back!</h1>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>

                    <div class="mt-[10px] text-center">Don't have an account yet? <a href="{{route('view.register')}}" class="text-blue-500">Register</a></div>
                </div>
            </div>
        </form>

    </div>
</body>
</html>