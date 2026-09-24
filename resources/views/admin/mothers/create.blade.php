<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Register Mother
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-xl p-6">

                <form action="{{ route('mothers.store') }}" method="POST">

                    @csrf

                    @include('admin.mothers._form')

                   <div class="mt-6 flex items-center gap-3">

    <button
        type="submit"
        class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded">

        Register Mother

    </button>

    <a href="{{ route('mothers.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">

        Cancel

    </a>

</div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>