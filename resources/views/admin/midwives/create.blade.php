<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Midwife
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="mb-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('midwives.store') }}" method="POST">

                    @csrf

                    <h3 class="text-xl font-bold mb-6">
                        Add New Midwife
                    </h3>

                    {{-- Reusable Form --}}
                    @include('admin.midwives._form')

                    <div class="mt-8 flex gap-3">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                            Save Midwife

                        </button>

                        <a href="{{ route('midwives.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>