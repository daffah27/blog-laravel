@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Postingan Baru</h1>
</div>

<form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" >
    </div>

    <div class="mb-3">
    <label class="form-label">Kategori</label>
    <select class="form-select" name="kategori_id">
        @foreach ($kategori as $item)
            <option value="{{ $item->id }}">{{ $item->slug }}</option>
            
        @endforeach
      </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Paragraf</label>
        <input id="paragraf" type="hidden" name="paragraf">
        <trix-editor input="paragraf"></trix-editor>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label @error('gambar') is-invalid @enderror">Silahkan isi gambar</label>
        <img class="img-preview img-fluid">
        <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImage()">
        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

    <button type="submit" class="btn btn-primary">Buat Postingan</button>
</form>


@endsection
