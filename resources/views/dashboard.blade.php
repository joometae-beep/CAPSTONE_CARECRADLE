<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CareCradle Administrator Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow rounded-lg p-6">

                <h1 class="text-3xl font-bold text-blue-700">
                    Welcome, {{ Auth::user()->name }}!
                </h1>

                <p class="mt-2 text-gray-600">
                    Role: <strong>{{ Auth::user()->role }}</strong>
                </p>

                <hr class="my-6">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Midwives -->
                    <div class="bg-blue-100 p-6 rounded-lg shadow">
                        <h3 class="text-lg font-bold">👩‍⚕️ Midwives</h3>
                        <p class="text-3xl font-bold text-blue-700">
                            {{ $midwives }}
                        </p>
                    </div>

                    <!-- Mothers -->
                    <div class="bg-pink-100 p-6 rounded-lg shadow">
                        <h3 class="text-lg font-bold">🤰 Mothers</h3>
                        <p class="text-3xl font-bold text-pink-700">
                            {{ $mothers }}
                        </p>
                    </div>

                    <!-- Infants -->
                    <div class="bg-green-100 p-6 rounded-lg shadow">
                        <h3 class="text-lg font-bold">👶 Infants</h3>
                        <p class="text-3xl font-bold text-green-700">
                            {{ $infants }}
                        </p>
                    </div>

                    <!-- Appointments -->
                    <div class="bg-yellow-100 p-6 rounded-lg shadow">
                        <h3 class="text-lg font-bold">📅 Appointments</h3>
                        <p class="text-3xl font-bold text-yellow-700">
                            {{ $appointments }}
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>