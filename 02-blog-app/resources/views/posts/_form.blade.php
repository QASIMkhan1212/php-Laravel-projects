<div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $item?->title) }}">
        @error('title')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Author</label>
        <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $item?->author) }}">
        @error('author')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="body" rows="4" class="form-control @error('body') is-invalid @enderror">{{ old('body', $item?->body) }}</textarea>
        @error('body')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
    </div>
