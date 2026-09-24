<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mother Profile
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-xl p-8">

                <div class="flex justify-between items-center mb-8">

                    <div>

                        <h1 class="text-3xl font-bold">
                            {{ $mother->first_name }} {{ $mother->last_name }}
                        </h1>

                       <p class="mt-2 text-xl font-bold text-pink-600 tracking-wide">
    {{ $mother->mother_code }}
</p>

                    </div>
@php
    $statusClasses = match($mother->status) {
        'Pregnant' => 'bg-blue-100 text-blue-700',
        'Delivered' => 'bg-green-100 text-green-700',
        'Referred' => 'bg-yellow-100 text-yellow-700',
        default => 'bg-gray-100 text-gray-700',
    };
@endphp

<span class="px-4 py-2 rounded-full font-semibold {{ $statusClasses }}">
    {{ $mother->status }}
</span>

                </div>

                <hr class="mb-8">

                <h2 class="text-xl font-bold mb-4">
                    Personal Information
                </h2>

                <div class="grid grid-cols-2 gap-6">

                    <div>
                        <strong>Full Name</strong><br>
                        {{ $mother->first_name }}
                        {{ $mother->middle_name }}
                        {{ $mother->last_name }}
                    </div>

                    <div>
                        <strong>Birth Date</strong><br>
                       {{ \Carbon\Carbon::parse($mother->birth_date)->format('F d, Y') }}
                    </div>
                    <div>
    <strong>Age</strong><br>

    {{ \Carbon\Carbon::parse($mother->birth_date)->age }} years old
</div>

                    <div>
                        <strong>Contact Number</strong><br>
                        {{ $mother->contact_number }}
                    </div>

                    <div>
                        <strong>Barangay</strong><br>
                        {{ $mother->barangay }}
                    </div>

                    <div class="col-span-2">
                        <strong>Address</strong><br>
                        {{ $mother->address }}
                    </div>

                    <div>
                        <strong>Blood Type</strong><br>
                        {{ $mother->blood_type }}
                    </div>

                </div>

                <hr class="my-8">

                <h2 class="text-xl font-bold mb-4">
                    Pregnancy Information
                </h2>

                <div class="grid grid-cols-2 gap-6">

                    <div>
                        <strong>Civil Status</strong><br>
                        {{ $mother->civil_status }}
                    </div>

                    <div>
                        <strong>Occupation</strong><br>
                        {{ $mother->occupation ?: '-' }}
                    </div>

                    <div>
                        <strong>Height</strong><br>
                        {{ $mother->height }} cm
                    </div>

                    <div>
                        <strong>Weight</strong><br>
                        {{ $mother->weight }} kg
                    </div>

                    <div>
                        <strong>LMP</strong><br>
                       {{ \Carbon\Carbon::parse($mother->last_menstrual_period)->format('F d, Y') }}
                    </div>

                    <div>
                        <strong>EDD</strong><br>
                       {{ \Carbon\Carbon::parse($mother->expected_delivery_date)->format('F d, Y') }}
                    </div>

                    <div>
                        <strong>Pregnancy Number</strong><br>
                        {{ $mother->pregnancy_number }}
                    </div>

                </div>
{{-- ====================================== --}}
{{-- PRENATAL CHECKUPS --}}
{{-- ====================================== --}}

<hr class="my-8">

<div class="flex justify-between items-center mb-4">

    <h2 class="text-xl font-bold">
        Prenatal Checkups
    </h2>

    <a href="{{ route('prenatal-checkups.create', $mother->id) }}"
       class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded-lg">

        + Add Prenatal Visit

    </a>

</div>

@if($mother->prenatalCheckups->count())

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

           <thead class="bg-pink-50">

    <tr>

        <th class="px-4 py-3 text-left font-semibold">
            Visit Date
        </th>

        <th class="px-4 py-3 text-left font-semibold">
            Gestation
        </th>

        <th class="px-4 py-3 text-left font-semibold">
            Blood Pressure
        </th>

        <th class="px-4 py-3 text-left font-semibold">
            Weight
        </th>

        <th class="px-4 py-3 text-center font-semibold">
            Action
        </th>

    </tr>

</thead>

            <tbody>

                @foreach($mother->prenatalCheckups as $visit)
<tr class="border-t hover:bg-gray-50">

    <td class="px-4 py-3">
        {{ \Carbon\Carbon::parse($visit->visit_date)->format('M d, Y') }}
    </td>

    <td class="px-4 py-3">
        {{ $visit->gestational_age_weeks }} Weeks
    </td>

    <td class="px-4 py-3 font-medium text-blue-600">
        {{ $visit->systolic_bp }}/{{ $visit->diastolic_bp }}
    </td>

    <td class="px-4 py-3">
        {{ number_format($visit->weight, 2) }} kg
    </td>

    <td class="px-4 py-3 text-center">

       <a
    href="{{ route('prenatal-checkups.show', $visit->id) }}"
    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded inline-block">

    👁 View

</a>

    </td>

</tr>
                @endforeach

            </tbody>

        </table>

    </div>

@else

    <div class="bg-gray-50 border rounded-xl p-8 text-center">

        <svg xmlns="http://www.w3.org/2000/svg"
             class="mx-auto h-12 w-12 text-gray-400 mb-4"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>

        </svg>

        <h3 class="text-lg font-semibold text-gray-700">
            No Prenatal Visits Yet
        </h3>

        <p class="text-gray-500 mt-2">
            This mother has no prenatal checkup records.
        </p>

    </div>

@endif
            </div>

        </div>
    </div>

</x-app-layout>
