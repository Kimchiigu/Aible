<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AIBLE | Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen flex items-center justify-center w-full">
        <div class="bg-white shadow-md rounded-lg px-8 py-6 max-w-md">
            <div class="mb-4">
                <a href="/" class="flex items-center text-center justify-center">
                    <span class="text-2xl font-bold items-center text-center justify-center">AIBLE</span>
                </a>
            </div>
            <h1 class="text-2xl font-bold text-center mb-4">Welcome Back!</h1>
            <form action="/login" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="your@email.com">
                    @error('email')
                        <div for="email" class="text-red-500 text-xs m-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" id="password" name="password" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your password">
                    <a href="#"
                        class="text-xs text-gray-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Forgot
                        Password?</a>
                    @error('password')
                        <div for="password" class="text-red-500 text-xs m-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 focus:outline-none" checked>
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="terms" class="font-light text-gray-500 text-sm">Don't have an account? <a class="text-sm font-bold text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/register">Sign Up</a></label>
                </div>
                <button onclick="alert("hello")" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>

                @if (Session::has('error'))
                    <div class="mt-4 p-4 mb-4 text-sm text-red-500 rounded-lg bg-blue-50 flex justify-center" role="alert">
                        <span class="font-bold text-center">{{Session::get('error')}}</span>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="mt-4 p-4 mb-4 text-sm text-green-500 rounded-lg bg-blue-50 flex justify-center" role="alert">
                        <span class="font-bold text-center">{{Session::get('success')}}</span>
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
