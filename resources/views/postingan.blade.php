
@extends('template.template')

@section('tubuh')
    
    <h2 class="mt-2 text-center text-bold">{{ $title }}</h2>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="/postingan">
          @if (request('kategori'))
          <input type="hidden" name="kategori" value="{{ request('kategori') }}">
          @endif

          @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
            <button class="btn btn-danger" type="submit" >Cari</button>
          </div>          
        </form>
      </div>
    </div>
    
    @if ($post->count())
      <div class="card mb-1 mt-3">

        @if($post[0]->gambar)
          <img class="card-img-top img-fluid " src="{{ asset('storage/' . $post[0]->gambar) }}" alt="">

        @else
        <img src="https://source.unsplash.com/500x400/?{{$post[0]->kategori->slug}}" class="card-img-top" alt="...">
        @endif
        
        <div class="card-body">
          <h5 class="card-title">{{ $post[0]->judul }}</h5>
          <p class="card-text">{{ $post[0]->excerpt }}</p>
          <small>
            <p>dibuat oleh : <a href="/postingan?author={{ $post[0]->user->name }}">{{ $post[0]->user->name }}</a> pada kategori : <a href="/postingan?kategori={{ $post[0]->kategori->slug }}">{{ $post[0]->kategori->slug }}</a></p>
          </small>
          <p class="card-text"><small class="text-muted">{{ $post[0]->created_at->diffForHumans() }}</small></p>
          <a href="/postingan/{{ $post[0]->id }}" class="btn btn-primary">Lihat Selengkapnya</a>
        </div>
      </div>
        

   
      <div class="container">
        <div class="row">
          @foreach ($post->skip(1) as $item)

            <div class="col-md-4">
              <div class="card">
                <a class="position-absolute bg-dark px-3 py-2 text-white text-decoration-none" href="/postingan?kategori={{ $item->kategori->slug }}">{{ $item->kategori->slug }}</a>

                @if($item->gambar)
              
                  <img class="card-img-top" src="{{ asset('storage/' . $item->gambar) }}" alt="">
      
                @else
                <img src="https://source.unsplash.com/500x400/?{{$item->kategori->slug}}" class="card-img-top" alt="...">
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $item->judul }}</h5>
                  <p class="card-text">{{ $item->excerpt }}</p>
                  <small>
                    <p>dibuat oleh : <a href="/postingan?author={{ $item->user->name }}">{{ $item->user->name }}</a> </p>
                  </small>
                  <p class="card-text"><small class="text-muted">{{ $item->created_at->diffForHumans() }}</small></p>
                  <a href="/postingan/{{ $item->id }}" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
              </div>
            </div>
              
          @endforeach
         
        </div>
      </div>

      {{ $post->links() }}

      @else
      <p class="text-center fs-4">Tidak ada post ditemukan</p>
    @endif

  
@endsection

