@extends('template.template')

@section('tubuh')
    
    <main class="form-signin w-100 m-auto">
      <form action="/register" method="POST">
        @csrf
        
        <h1 class="h3 mb-3 fw-normal text-center">Halaman Register</h1>
    
        <div class="form-floating">
          <input required type="hidden" name="is_admin" class="form-control" id="is_admin" value="0">
          <input required type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name@example.com" value="{{ old('name') }}">
          <label for="name">Nama Anda</label>
          @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-floating">
            <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
            <label for="email">Email Anda</label>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        <div class="form-floating">
          <input required type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" >
          <label for="password">Password</label>
          @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-floating">
            <input required type="password" name="konfirpassword" class="form-control @error('konfirpassword') is-invalid @enderror" id="konfirpassword" placeholder="Password">
            <label for="konfirpassword">Konfirmasi Password</label>
            @error('konfirpassword') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          
    
   
        <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
      </form>
      <small> <a href="/login">Login disini</a></small>
    </main>


@endsection