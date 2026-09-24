<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Midwife
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('midwives.update', $midwife->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    @include('admin.midwives._form')

                    <div class="mt-8 flex gap-3">

                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg">
                            Update Midwife
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