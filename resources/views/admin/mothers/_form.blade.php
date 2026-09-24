
@if(!isset($mother))
{{-- ============================= --}}
{{-- ACCOUNT INFORMATION --}}
{{-- ============================= --}}

<h2 class="text-xl font-bold mb-4">
    Account Information
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- Username --}}
    <div>
        <label class="font-medium">
            Username <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="username"
            value="{{ old('username') }}"
            class="w-full border rounded-lg p-2 mt-1"
            required>

        @error('username')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Password --}}
    <div>
        <label class="font-medium">
            Initial Password <span class="text-red-500">*</span>
        </label>

        <input
            type="password"
            name="password"
            class="w-full border rounded-lg p-2 mt-1"
            required>

        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Confirm Password --}}
    <div>
        <label class="font-medium">
            Confirm Password <span class="text-red-500">*</span>
        </label>

        <input
            type="password"
            name="password_confirmation"
            class="w-full border rounded-lg p-2 mt-1"
            required>
    </div>

</div>

<hr class="my-8">
@endif

{{-- ============================= --}}
{{-- PERSONAL INFORMATION --}}
{{-- ============================= --}}

<h2 class="text-xl font-bold mb-4">
    Personal Information
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- First Name --}}
    <div>
        <label class="font-medium">
            First Name <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="first_name"
            value="{{ old('first_name', $mother->first_name ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            required>
    </div>

    {{-- Middle Name --}}
    <div>
        <label class="font-medium">
            Middle Name
        </label>

        <input
            type="text"
            name="middle_name"
            value="{{ old('middle_name', $mother->middle_name ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1">
    </div>

    {{-- Last Name --}}
    <div>
        <label class="font-medium">
            Last Name <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="last_name"
            value="{{ old('last_name', $mother->last_name ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            required>
    </div>

    {{-- Birth Date --}}
    <div>
        <label class="font-medium">
            Birth Date <span class="text-red-500">*</span>
        </label>

        <input
            type="date"
            name="birth_date"
            value="{{ old('birth_date', $mother->birth_date ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            required>
    </div>

    {{-- Contact Number --}}
    <div>
        <label class="font-medium">
            Contact Number <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="contact_number"
            value="{{ old('contact_number', $mother->contact_number ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            required>
    </div>

    {{-- Barangay --}}
    <div>
        <label class="font-medium">
            Barangay <span class="text-red-500">*</span>
        </label>

        <input
            type="text"
            name="barangay"
            value="{{ old('barangay', $mother->barangay ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            required>
    </div>

    {{-- Address --}}
    <div class="md:col-span-2">
        <label class="font-medium">
            Complete Address <span class="text-red-500">*</span>
        </label>

        <textarea
            name="address"
            rows="3"
            class="w-full border rounded-lg p-2 mt-1"
            required>{{ old('address', $mother->address ?? '') }}</textarea>
    </div>

    {{-- Blood Type --}}
    <div>
        <label class="font-medium">
            Blood Type <span class="text-red-500">*</span>
        </label>

        <select
            name="blood_type"
            class="w-full border rounded-lg p-2 mt-1"
            required>

            <option value="">Select Blood Type</option>

            @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $type)

                <option
                    value="{{ $type }}"
                    @selected(old('blood_type', $mother->blood_type ?? '') == $type)>

                    {{ $type }}

                </option>

            @endforeach

        </select>
    </div>

</div>

<hr class="my-8">

{{-- ============================= --}}
{{-- PREGNANCY INFORMATION --}}
{{-- ============================= --}}

<h2 class="text-xl font-bold mb-4">
    Pregnancy Information
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- Civil Status --}}
    <div>
        <label class="font-medium">
            Civil Status <span class="text-red-500">*</span>
        </label>

        <select
            name="civil_status"
            class="w-full border rounded-lg p-2 mt-1"
            required>

            <option value="">Select Civil Status</option>

            @foreach(['Single','Married','Widowed','Separated'] as $status)

                <option
                    value="{{ $status }}"
                    @selected(old('civil_status', $mother->civil_status ?? '') == $status)>

                    {{ $status }}

                </option>

            @endforeach

        </select>

    </div>

    {{-- Occupation --}}
    <div>

        <label class="font-medium">
            Occupation
        </label>

        <input
            type="text"
            name="occupation"
            value="{{ old('occupation', $mother->occupation ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1">

    </div>

    {{-- PhilHealth --}}
    <div>

        <label class="font-medium">
            PhilHealth Number
        </label>

        <input
            type="text"
            name="philhealth_number"
            value="{{ old('philhealth_number', $mother->philhealth_number ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1">

    </div>

    {{-- Height --}}
    <div>

        <label class="font-medium">
            Height (cm) <span class="text-red-500">*</span>
        </label>

        <input
            type="number"
            step="0.01"
            name="height"
            value="{{ old('height', $mother->height ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            placeholder="e.g. 160"
            required>

    </div>

    {{-- Weight --}}
    <div>

        <label class="font-medium">
            Weight (kg) <span class="text-red-500">*</span>
        </label>

        <input
            type="number"
            step="0.01"
            name="weight"
            value="{{ old('weight', $mother->weight ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            placeholder="e.g. 55"
            required>

    </div>

    {{-- Last Menstrual Period --}}
    <div>

        <label class="font-medium">
            Last Menstrual Period <span class="text-red-500">*</span>
        </label>

        <input
            type="date"
            name="last_menstrual_period"
            value="{{ old('last_menstrual_period', $mother->last_menstrual_period ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            required>

    </div>

    {{-- Expected Delivery Date --}}
    <div>

        <label class="font-medium">
            Expected Delivery Date <span class="text-red-500">*</span>
        </label>

        <input
            type="date"
            name="expected_delivery_date"
            value="{{ old('expected_delivery_date', $mother->expected_delivery_date ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            required>

    </div>

    {{-- Pregnancy Number --}}
    <div>

        <label class="font-medium">
            Pregnancy Number <span class="text-red-500">*</span>
        </label>

        <input
            type="number"
            min="1"
            name="pregnancy_number"
            value="{{ old('pregnancy_number', $mother->pregnancy_number ?? '') }}"
            class="w-full border rounded-lg p-2 mt-1"
            required>

    </div>

    @if(isset($mother))

<div>
    <label class="font-medium">
        Status <span class="text-red-500">*</span>
    </label>

    <select
        name="status"
        class="w-full border rounded-lg p-2 mt-1"
        required>

        <option value="Pregnant"
            @selected(old('status', $mother->status) == 'Pregnant')>
            Pregnant
        </option>

        <option value="Delivered"
            @selected(old('status', $mother->status) == 'Delivered')>
            Delivered
        </option>

        <option value="Referred"
            @selected(old('status', $mother->status) == 'Referred')>
            Referred
        </option>

    </select>

</div>

@endif

</div>
