<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <style>
        .login {
            background: url('{{ asset('admin/dist/images/login-new.jpeg') }}');
        }
    </style>
    <title>Register</title>
</head>
<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">

            <!-- Laravel Register Form -->
            <form method="POST" action="{{ route('register') }}" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                @csrf
                <p class="text-gray-800 font-medium text-center text-lg font-bold">Register</p>

                <!-- Name -->
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="name">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                           class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                    @error('name')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                           class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="password">Password</label>
                    <input id="password" name="password" type="password" required
                           class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                    @error('password')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                           class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
                    @error('password_confirmation')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
                        Register
                    </button>
                </div>

                <!-- Already registered link -->
                <div class="mt-4 text-center">
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-800 font-bold">
                        Already have an account?
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>
