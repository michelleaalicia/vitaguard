<div class="mb-3">

    <label class="form-label">Doctor</label>

    <select name="doctor_id" class="form-select" required>

        <option value="">Choose Doctor</option>

        @foreach($doctors as $doctor)

        <option value="{{ $doctor->id }}" {{ old('doctor_id', $selectedDoctor ?? '') == $doctor->id ? 'selected' : '' }}>

            {{ $doctor->user->name }}
            -
            {{ $doctor->specialization }}

        </option>

        @endforeach

    </select>

</div>

<div class="mb-3">

    <label class="form-label">Booking Date</label>

    <input type="date" name="booking_date" class="form-control" value="{{ old('booking_date') }}"
        min="{{ date('Y-m-d') }}" required>

    @error('booking_date')
    <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="mb-3">

    <label class="form-label">Booking Time</label>

    <input type="time" name="booking_time" class="form-control" value="{{ old('booking_time') }}" required>

    @error('booking_time')
    <small class="text-danger">{{ $message }}</small>
    @enderror

</div>