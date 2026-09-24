<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mother Management
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
                        Registered Mothers
                    </h1>

                    <a href="{{ route('mothers.create') }}"
                       class="rounded-lg bg-pink-600 px-5 py-2 text-white shadow hover:bg-pink-700 transition">

                        + Register Mother

                    </a>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full border border-gray-300">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="border p-3">Mother Code</th>

                                <th class="border p-3">Full Name</th>

                                <th class="border p-3">Barangay</th>

                                <th class="border p-3">Contact Number</th>

                                <th class="border p-3">Status</th>

                                <th class="border p-3">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($mothers as $mother)

                            <tr>

                                <td class="border p-3">
                                    {{ $mother->mother_code }}
                                </td>

                                <td class="border p-3">
                                    {{ $mother->first_name }}
                                    {{ $mother->middle_name }}
                                    {{ $mother->last_name }}
                                </td>

                                <td class="border p-3">
                                    {{ $mother->barangay }}
                                </td>

                                <td class="border p-3">
                                    {{ $mother->contact_number }}
                                </td>

                                <td class="border p-3 text-center">

                                    <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold text-sm">
                                        {{ $mother->status }}
                                    </span>

                                </td>

                                <td class="border p-3">

                                    <div class="flex justify-center gap-2">

    <a href="{{ route('mothers.show', $mother->id) }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">

        View

    </a>

    <a href="{{ route('mothers.edit', $mother->id) }}"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">

        Edit

    </a>

</div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center p-6 text-gray-500">

                                    No registered mothers found.

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