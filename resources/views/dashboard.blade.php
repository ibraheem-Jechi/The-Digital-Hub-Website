<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} 
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p>{{ __("You're logged in!") }}</p>

                    @php
                        $role = Auth()->user()->getRoleNames()->first(); // single role name or null
                    @endphp

                    @if ($role === 'admin')
                        <p class="mt-4">
                            {{ __("You are logged in as ") }}
                            <strong class="text-blue-600">{{ ucfirst($role) }}</strong>
                        </p>
                    @elseif($role)
                        <p class="mt-4 text-green-600">
                            {{ __("You are logged in as ") }}
                            <strong class="text-blue-600">{{ ucfirst($role) }}</strong>
                        </p>
                    @else
                        <p class="mt-4 text-red-600">
                            {{ __("You are logged in but no role has been assigned.") }}
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
