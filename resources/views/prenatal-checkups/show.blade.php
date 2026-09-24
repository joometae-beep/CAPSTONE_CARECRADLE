<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Prenatal Visit Details
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-xl p-8">

                <div class="flex justify-between items-center mb-6">

                  <div>

    <h1 class="text-3xl font-bold">
        Prenatal Visit
    </h1>

    <p class="mt-2 text-xl font-bold text-pink-600">
        {{ $prenatalCheckup->mother->mother_code }}
    </p>

    <p class="text-lg font-semibold mt-2">
        {{ $prenatalCheckup->mother->first_name }}
        {{ $prenatalCheckup->mother->last_name }}
    </p>

    <p class="text-gray-500 mt-1">
        Visit Date:
        {{ \Carbon\Carbon::parse($prenatalCheckup->visit_date)->format('F d, Y') }}
    </p>

<div class="flex gap-2">

    <a
        href="{{ route('prenatal-checkups.edit', $prenatalCheckup->id) }}"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

        ✏ Edit

    </a>

    <form
        action="{{ route('prenatal-checkups.destroy', $prenatalCheckup->id) }}"
        method="POST"
        onsubmit="return confirm('Are you sure you want to delete this prenatal visit? This action cannot be undone.');">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">

            🗑 Delete

        </button>

    </form>

    <a
        href="{{ route('mothers.show', $prenatalCheckup->mother_id) }}"
        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">

        ← Back

    </a>

</div>

                <hr class="mb-8">

                <h2 class="text-xl font-bold mb-4">
                    Visit Information
                </h2>

                <div class="grid grid-cols-2 gap-6">

                    <div>
                        <strong>Visit Date</strong><br>
                        {{ \Carbon\Carbon::parse($prenatalCheckup->visit_date)->format('F d, Y') }}
                    </div>

                    <div>
                        <strong>Gestational Age</strong><br>
                        {{ $prenatalCheckup->gestational_age_weeks }} Weeks
                    </div>

                    <div>
                        <strong>Blood Pressure</strong><br>
                        {{ $prenatalCheckup->systolic_bp }}/{{ $prenatalCheckup->diastolic_bp }}
                    </div>

                    <div>
                        <strong>Weight</strong><br>
                        {{ number_format($prenatalCheckup->weight, 2) }} kg
                    </div>

                    <div>
                        <strong>Fundal Height</strong><br>
                        {{ $prenatalCheckup->fundal_height ?? '-' }} cm
                    </div>

                    <div>
                        <strong>Fetal Heart Rate</strong><br>
                        {{ $prenatalCheckup->fetal_heart_rate ?? '-' }} bpm
                    </div>

                </div>

                <hr class="my-8">

                <h2 class="text-xl font-bold mb-4">
                    Laboratory Findings
                </h2>

                <div class="grid grid-cols-2 gap-6">

                    <div>
                        <strong>Urine Protein</strong><br>
                        {{ $prenatalCheckup->urine_protein ?? '-' }}
                    </div>

                    <div>
                        <strong>Urine Glucose</strong><br>
                        {{ $prenatalCheckup->urine_glucose ?? '-' }}
                    </div>

                </div>

                <hr class="my-8">

                <h2 class="text-xl font-bold mb-4">
                    Assessment
                </h2>

                <div class="space-y-6">

                    <div>
                        <strong>Maternal Condition</strong><br>
                        {{ $prenatalCheckup->maternal_condition ?: '-' }}
                    </div>

                    <div>
                        <strong>Notes</strong><br>
                        {{ $prenatalCheckup->notes ?: '-' }}
                    </div>

                    <div>
                        <strong>Next Visit Date</strong><br>
                        {{ $prenatalCheckup->next_visit_date
                            ? \Carbon\Carbon::parse($prenatalCheckup->next_visit_date)->format('F d, Y')
                            : '-' }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>