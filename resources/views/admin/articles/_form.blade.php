<div class="row">

    <div class="col-md-12 mb-3">
        <label class="form-label">Title</label>

        <input type="text" name="title" class="form-control" value="{{ old('title', $article->title ?? '') }}" required>

        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Content</label>

        <textarea name="content" rows="8" class="form-control"
            required>{{ old('content', $article->content ?? '') }}</textarea>

        @error('content')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Image</label>

        <input type="file" name="image" class="form-control">

        @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        @if(isset($article) && $article->image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $article->image) }}" width="150" class="img-thumbnail">
            </div>
        @endif
    </div>

</div>