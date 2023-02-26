@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Postingan</h1>
</div>

<form method="POST" action="/dashboard/posts/{{ $post->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $post->judul) }}">
    </div>

    <div class="mb-3">
    <label class="form-label">Kategori</label>
    <select class="form-select" name="kategori_id">
        @foreach ($kategori as $item)
            @if(old('kategori_id', $post->kategori->id) == $item->id)
            <option value="{{ $item->id }}" selected>{{ $item->slug }}</option>
            @else
            <option value="{{ $item->id }}">{{ $item->slug }}</option>
            @endif
        @endforeach
      </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Paragraf</label>
        <input id="paragraf" type="hidden" name="paragraf" value="{{ old('paragraf', $post->paragraf) }}">
        <trix-editor input="paragraf"></trix-editor>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label @error('gambar') is-invalid @enderror">Silahkan isi gambar</label>
        <input type="hidden" name="oldImage" value="{{ $post->gambar }}">
        @if($post->gambar)
            <img src="{{ asset('storage/' . $post->gambar) }}" class="img-preview img-fluid d-block">
        @else
            <img class="img-preview img-fluid">
        @endif
        
        <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImage()">
        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>


    <button type="submit" class="btn btn-primary">Edit Postingan</button>
</form>


@endsection
