<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="./admin/dist/styles.css">
    <link rel="stylesheet" href="./admin/dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard | Tailwind Admin</title>
</head>
<body>
    {{-- @extends('dashboard.dashboard') or extend a layout if you have one --}}

@section('content')
<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Manage Roles</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @foreach($users as $user)
        <form method="POST" action="{{ url('/dashboard/manage-roles') }}" class="mb-2 flex items-center space-x-2">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <span class="w-40">{{ $user->email }}</span>
            <select name="role" class="border rounded p-1">
                <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Update</button>
        </form>
    @endforeach
</div>
@endsection
</body>
</html>
