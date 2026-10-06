<div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $item?->title) }}">
        @error('title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $item?->description) }}</textarea>
        @error('description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Due date</label>
        <input type="date" name="due_date" class="form-control @error('due_date') is-invalid @enderror" value="{{ old('due_date', $item?->due_date?->format('Y-m-d')) }}">
        @error('due_date')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="form-check mb-3">
        <input type="hidden" name="is_completed" value="0">
        <input type="checkbox" class="form-check-input" id="is_completed" name="is_completed" value="1" @checked(old('is_completed', $item?->is_completed))>
        <label class="form-check-label" for="is_completed">Completed</label>
    </div>
