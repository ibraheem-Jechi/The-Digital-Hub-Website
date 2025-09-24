<!doctype html>
<html lang="en">

<head>
  <title>Login | Tailwind Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
        <form method="POST" action="{{ route('login') }}" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
          @csrf

          <p class="text-gray-800 font-medium text-center text-lg font-bold">Login</p>

          @if ($errors->any())
            <div class="text-red-600 text-sm mb-3">
              {{ $errors->first('email') ?? $errors->first() }}
            </div>
          @endif

          <div>
            <label class="block text-sm text-gray-600" for="email">Email</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email"
              required value="{{ old('email') }}" autocomplete="username" />
          </div>

          <div class="mt-2">
            <label class="block text-sm text-gray-600" for="password">Password</label>
            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password"
              type="password" required autocomplete="current-password" />
          </div>

          <div class="mt-4 flex items-center justify-between">
            <label class="inline-flex items-center">
              <input type="checkbox" name="remember" class="mr-2"> Remember me
            </label>
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">
              Login
            </button>
          </div>
        </form>


      </div>
    </div>
  </div>
</body>

</html>