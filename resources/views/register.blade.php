<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AIBLE | Register</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen flex items-center justify-center w-full">
        <div class="bg-white shadow-md rounded-lg px-8 py-6 max-w-md w-96">
            <div class="mb-4">
                <a href="/" class="flex items-center text-center justify-center">
                    <span class="text-2xl font-bold items-center text-center justify-center">AIBLE</span>
                </a>
            </div>
            <h1 class="text-2xl font-bold text-center mb-4">Create an Account</h1>
            <form action="/register" method="post">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" name="username" id="username" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your username">
                    @error('username')
                        <div for="terms" class="text-red-500 text-xs m-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="your@email.com">
                    @error('email')
                        <div for="terms" class="text-red-500 text-xs m-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" id="password" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your password">
                    @error('password')
                        <div for="terms" class="text-red-500 text-xs m-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password" class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Confirm your password">
                    @error('password')
                        <div for="terms" class="text-red-500 text-xs m-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="checkbox" id="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 focus:outline-none">
                        <div class="ml-3 text-sm">
                            <label for="checkbox" class="font-light text-gray-500">I accept the <a class="text-md font-bold text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="#">Terms and Conditions</a></label>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    {{-- @error('checkbox')
                        <div for="terms" class="text-red-500 text-xs m-1">{{ $message }}</div>
                        <div for="terms" class="text-red-500 text-xs m-1">You must agree to the terms and conditions</div>
                    @enderror --}}
                </div>
                <div class="mb-4">
                    <label for="terms" class="font-light text-gray-500 text-sm">Already have an account? <a class="text-sm font-bold text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/login">Sign in</a></label>
                </div>
                <button onclick="alert("hello")" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>

                @if (Session::has('success'))
                    <div class="mt-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-blue-50 flex justify-center" role="alert">
                        <span class="font-bold text-center">Registration Successfully!</span>
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
