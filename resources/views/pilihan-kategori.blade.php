
@extends('template.template')

@section('tubuh')
    
<h1>Pilihan Kategori</h1>

    @foreach ($kategori as $item)
    <div class="card mt-5" style="">
        <div class="card-body">
          <h5 class="card-title">{{ $item->slug}}</h5>
          <a href="/postingan?kategori={{ $item->slug }}" class="btn btn-primary">Lihat Selengkapnya</a>
        </div>
      </div>
        
    @endforeach
    
@endsection

