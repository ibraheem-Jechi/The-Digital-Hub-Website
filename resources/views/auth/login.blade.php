<!doctype html>
<html lang="en">

<head>
  <title>Login | Tailwind Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <style>
    .login {
      background: url('{{ asset('admin/dist/images/login-new.jpeg') }}');
    }
  </style>  
</head>

<body class="h-screen font-sans login bg-cover">
  <div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
      <div class="leading-loose">

        <!-- Laravel Login Form -->
        <form method="POST" action="{{ route('login') }}" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
          @csrf

          <p class="text-gray-800 font-medium text-center text-lg font-bold">Login</p>

          <!-- Email -->
          <div class="mt-4">
            <label class="block text-sm text-gray-600" for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                   class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
            @error('email')
              <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
          </div>

          <!-- Password -->
          <div class="mt-4">
            <label class="block text-sm text-gray-600" for="password">Password</label>
            <input id="password" name="password" type="password" required
                   class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded">
            @error('password')
              <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
          </div>

          <!-- Remember Me -->
          <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" name="remember"
                     class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
              <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
          </div>

          <!-- Buttons & Links -->
          <div class="mt-4 flex items-center justify-between">
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}"
                 class="text-sm text-blue-600 hover:text-blue-800 font-bold">
                 Forgot Password?
              </a>
            @endif

            <button type="submit"
                    class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">
              Login
            </button>
          </div>

          <a href="{{ route('register') ?? '#' }}" 
             class="inline-block mt-4 text-sm text-blue-600 hover:text-blue-800 font-bold">
             Not registered?
          </a>
        </form>

      </div>
    </div>
  </div>
</body>

</html>
