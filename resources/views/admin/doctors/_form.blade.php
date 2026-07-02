<div class="mb-3">

    <label class="form-label">Name</label>

    <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->user->name ?? '') }}" required>

</div>

<div class="mb-3">

    <label class="form-label">Email</label>

    <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->user->email ?? '') }}"
        required>

</div>

@if(!isset($doctor))

    <div class="mb-3">

        <label class="form-label">Password</label>

        <input type="password" name="password" class="form-control" required>

    </div>

@endif

<div class="mb-3">

    <label class="form-label">Specialization</label>

    @php

        $specializations = [
            'General Practitioner',
            'Cardiologist',
            'Dentist',
            'Dermatologist',
            'Neurologist',
            'Pediatrician',
            'Orthopedic',
            'Ophthalmologist',
            'Psychiatrist',
            'Obstetrician & Gynecologist'
        ];

    @endphp

    <select name="specialization" class="form-select" required>

        <option value="">-- Select Specialization --</option>

        @foreach($specializations as $specialization)

            <option value="{{ $specialization }}" {{ old('specialization', $doctor->specialization ?? '') == $specialization ? 'selected' : '' }}>

                {{ $specialization }}

            </option>

        @endforeach

    </select>

</div>

<div class="mb-3">

    <label class="form-label">Phone Number</label>

    <input type="text" name="phone" class="form-control" placeholder="08xxxxxxxxxx"
        value="{{ old('phone', $doctor->phone ?? '') }}">

</div>

<div class="mb-3">

    <label class="form-label">Description</label>

    <textarea name="description" rows="4" class="form-control"
        placeholder="Doctor profile...">{{ old('description', $doctor->description ?? '') }}</textarea>

</div>

<div class="mb-3">

    <label class="form-label d-block">Available Days</label>

    @php

        $days = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ];

        $selectedDays = old(
            'available_days',
            isset($doctor)
            ? explode(',', $doctor->available_days)
            : []
        );

    @endphp

    <div class="row">

        @foreach($days as $day)

            <div class="col-md-3 mb-2">

                <div class="form-check">

                    <input class="form-check-input" type="checkbox" name="available_days[]" value="{{ $day }}"
                        id="{{ $day }}" {{ in_array($day, $selectedDays) ? 'checked' : '' }}>

                    <label class="form-check-label" for="{{ $day }}">

                        {{ $day }}

                    </label>

                </div>

            </div>

        @endforeach

    </div>

</div>

<div class="row">

    <div class="col-md-6">

        <label class="form-label">Practice Start</label>

        <input type="time" name="available_start" class="form-control"
            value="{{ old('available_start', $doctor->available_start ?? '') }}">

    </div>

    <div class="col-md-6">

        <label class="form-label">Practice End</label>

        <input type="time" name="available_end" class="form-control"
            value="{{ old('available_end', $doctor->available_end ?? '') }}">

    </div>

</div>

<div class="mt-3">

    <label class="form-label">Doctor Photo</label>

    <input type="file" name="photo" class="form-control" accept=".jpg,.jpeg,.png">

    <small class="text-muted">
        Allowed file types: JPG, JPEG, PNG (Max 2 MB)
    </small>

    @isset($doctor)

        @if($doctor->photo)

            <div class="mt-3">

                <img src="{{ asset('storage/' . $doctor->photo) }}" width="140" class="rounded border shadow-sm">

            </div>

        @endif

    @endisset

</div>