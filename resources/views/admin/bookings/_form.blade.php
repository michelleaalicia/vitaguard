<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Member</label>

        <select name="member_id" class="form-select" required>

            <option value="">-- Select Member --</option>

            @foreach($members as $member)

                <option value="{{ $member->id }}" {{ old('member_id', $booking->member_id ?? '') == $member->id ? 'selected' : '' }}>

                    {{ $member->name }}

                </option>

            @endforeach

        </select>

        @error('member_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Doctor</label>

        <select name="doctor_id" class="form-select" required>

            <option value="">-- Select Doctor --</option>

            @foreach($doctors as $doctor)

                <option value="{{ $doctor->id }}" {{ old('doctor_id', $booking->doctor_id ?? '') == $doctor->id ? 'selected' : '' }}>

                    {{ $doctor->user->name }}
                    ({{ $doctor->specialization }})

                </option>

            @endforeach

        </select>

        @error('doctor_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Booking Date</label>

        <input type="date" name="booking_date" class="form-control"
            value="{{ old('booking_date', $booking->booking_date ?? '') }}" required>

        @error('booking_date')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Booking Time</label>

        <input type="time" name="booking_time" class="form-control"
            value="{{ old('booking_time', $booking->booking_time ?? '') }}" required>

        @error('booking_time')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select">

            @foreach(['Pending', 'Approved', 'Completed', 'Cancelled'] as $status)

                <option value="{{ $status }}" {{ old('status', $booking->status ?? 'Pending') == $status ? 'selected' : '' }}>

                    {{ $status }}

                </option>

            @endforeach

        </select>
    </div>

</div>