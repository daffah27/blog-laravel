@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori Tersedia</h1>
    </div>

    @if(session()->has('succes'))
    <div class="alert alert-success">{{ session('succes') }}</div> 
    @endif

    @if(session()->has('hapus'))
    <div class="alert alert-success">{{ session('hapus') }}</div> 
    @endif

    @if(session()->has('edit'))
    <div class="alert alert-success">{{ session('edit') }}</div> 
    @endif

    <a href="/dashboard/kategori/create" class="btn btn-primary">Tambah Kategori</a>
    <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>

          </tr>
        </thead>
        <tbody>

            @foreach ($kategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <a href="/dashboard/kategori/{{ $item->id }}/edit" class="badge bg-warning">Edit</a>
                        <form action="/dashboard/kategori/{{ $item->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button href="" class="badge bg-danger border-0" onclick="return confirm('apakah anda ingin menghapus ?')">Hapus</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
          
        </tbody>
      </table>

@endsection
