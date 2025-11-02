@section('title', 'ویرایش خبر')
@section('page-title', 'ویرایش خبر')

@section('content')
<div class="card">
    <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>عنوان خبر *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}" required>
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>متن خبر *</label>
            <textarea name="content" class="form-control" rows="6" required>{{ old('content', $news->content) }}</textarea>
            @error('content')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>تصویر خبر</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
            @if($news->image)
                <div style="margin-top: 10px;">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="width: 120px; height: 120px; object-fit: cover; border-radius: 6px;">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label>تاریخ انتشار *</label>
            <input type="date" name="published_at" class="form-control" value="{{ old('published_at', optional($news->published_at)->format('Y-m-d')) }}" required>
            @error('published_at')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $news->is_active) ? 'checked' : '' }}>
                فعال
            </label>
        </div>

        <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-danger">بازگشت</a>
    </form>
</div>
@endsection