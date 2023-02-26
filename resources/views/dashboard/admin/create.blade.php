@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Kategori Baru</h1>
</div>

<form method="POST" action="/dashboard/kategori" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="slug" class="form-control" >

{{-- 
        <input type="hidden" name="kategori_id" class="form-control" value="{{ $kategori[0]->id }}" > --}}
    </div>

    <button type="submit" class="btn btn-primary">Buat Kategori</button>
</form>


@endsection
