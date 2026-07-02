<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Member Name</label>

        <input type="text" name="name" class="form-control" value="{{ old('name', $member->name ?? '') }}" required>

        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>

        <input type="email" name="email" class="form-control" value="{{ old('email', $member->email ?? '') }}" required>

        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    @if(!isset($member))
        <div class="col-md-6 mb-3">
            <label class="form-label">Password</label>

            <input type="password" name="password" class="form-control" required>

            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    @endif

</div>