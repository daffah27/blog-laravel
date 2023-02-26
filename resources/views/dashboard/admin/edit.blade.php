@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kategori</h1>
</div>

<form method="POST" action="/dashboard/kategori/{{ $kategori}}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="judul" class="form-control" value="{{ old('slug', $kategori) }}">
    </div>

    <button type="submit" class="btn btn-primary">Edit Postingan</button>
</form>


@endsection
