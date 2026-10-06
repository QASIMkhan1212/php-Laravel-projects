<div class="mb-3">
        <label class="form-label">Full name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item?->name) }}">
        @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $item?->phone) }}">
        @error('phone')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $item?->email) }}">
        @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" rows="4" class="form-control @error('address') is-invalid @enderror">{{ old('address', $item?->address) }}</textarea>
        @error('address')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
