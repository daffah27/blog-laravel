
@extends('template.template')

@section('tubuh')
    
  <div class="card mt-5" style="">
    <div class="card-body">
      <h5 class="card-title">{{ $postbaru->judul }}</h5>

      <p class="card-text">Kategori : <a href="/postingan?kategori={{ $postbaru->kategori->slug }}">{{ $postbaru->kategori->slug}}</a></p>
      <p class="card-text">By : {{ $postbaru->user->name }}</p>
      <p class="card-text">{{ $postbaru->paragraf }}</p>
   
      <a href="/postingan" class="btn btn-primary">Kembali</a>
    </div>
  </div>
    
@endsection

