<div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $item?->title) }}">
        @error('title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Amount</label>
        <input type="number" step="0.01" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $item?->amount) }}">
        @error('amount')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category" class="form-select @error('category') is-invalid @enderror">
            @foreach(['Food', 'Transport', 'Bills', 'Shopping', 'Health', 'Other'] as $opt)
                <option value="{{ $opt }}" @selected(old('category', $item?->category ?? 'Other') === $opt)>{{ $opt }}</option>
            @endforeach
        </select>
        @error('category')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="spent_on" class="form-control @error('spent_on') is-invalid @enderror" value="{{ old('spent_on', $item?->spent_on?->format('Y-m-d')) }}">
        @error('spent_on')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
