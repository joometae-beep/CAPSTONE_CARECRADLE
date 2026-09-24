<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Midwife Management
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-xl p-6">

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="mb-5 rounded-lg border border-green-400 bg-green-100 px-4 py-3 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex items-center justify-between mb-6">

                    <h1 class="text-2xl font-bold text-gray-800">
                        Registered Midwives
                    </h1>

                    <a href="{{ route('midwives.create') }}"
                        class="rounded-lg bg-blue-600 px-5 py-2 text-white shadow hover:bg-blue-700 transition">
                        + Add Midwife
                    </a>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full border border-gray-200 rounded-lg overflow-hidden">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="px-4 py-3 border text-left">Username</th>

                                <th class="px-4 py-3 border text-left">Full Name</th>

                                <th class="px-4 py-3 border text-left">Contact Number</th>

                                <th class="px-4 py-3 border text-left">Email</th>

                                <th class="px-4 py-3 border text-center">Status</th>

                                <th class="px-4 py-3 border text-center" style="width:220px;">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($midwives as $midwife)

                            <tr class="hover:bg-gray-50">

                                <td class="border px-4 py-3">
                                    {{ $midwife->username }}
                                </td>

                                <td class="border px-4 py-3">
                                    {{ trim($midwife->first_name.' '.$midwife->middle_name.' '.$midwife->last_name) }}
                                </td>

                                <td class="border px-4 py-3">
                                    {{ $midwife->contact_number ?: '-' }}
                                </td>

                                <td class="border px-4 py-3">
                                    {{ $midwife->email ?: '-' }}
                                </td>

                                <td class="border px-4 py-3 text-center">

                                    @if($midwife->is_active)

                                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">
                                            Active
                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-sm font-semibold text-red-700">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td class="border px-4 py-3">

                                    <div class="flex justify-center items-center gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('midwives.edit', $midwife->id) }}"
                                            class="rounded bg-yellow-500 px-3 py-2 text-sm font-medium text-white hover:bg-yellow-600">
                                            Edit
                                        </a>

                                        {{-- Active --}}
                                        @if($midwife->is_active)

                                            <form action="{{ route('midwives.destroy', $midwife->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Deactivate this midwife?')"
                                                    class="rounded bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700">

                                                    Deactivate

                                                </button>

                                            </form>

                                        @else

                                            <form action="{{ route('midwives.activate', $midwife->id) }}" method="POST">

                                                @csrf

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Activate this midwife?')"
                                                    class="rounded bg-green-600 px-3 py-2 text-sm font-medium text-white hover:bg-green-700">

                                                    Activate

                                                </button>

                                            </form>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="border px-4 py-8 text-center text-gray-500">

                                    No registered midwives found.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>