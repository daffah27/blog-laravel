@extends('dashboard.layouts.main')

@section('container')

    <div class="card mt-5" style="">
        <div class="card-body">
        <h5 class="card-title">{{ $post->judul }}</h5>

        <p class="card-text">Kategori : {{ $post->kategori->slug}}</a></p>
        <a class="btn btn-success" href="/dashboard/posts" >Kembali kesemua post</a>
        <a class="btn btn-warning">Edit</a>
        <a class="btn btn-danger">Hapus</a>
        <div style="max-height:350px; max-width: 700px; overflow:hidden">
            <img src="{{ asset('storage/' . $post->gambar) }}" alt="">
        </div>
        
        <p class="card-text">{!! $post->paragraf !!}</p>
        </div>
    </div>

@endsection
