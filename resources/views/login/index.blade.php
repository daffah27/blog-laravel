@extends('template.template')

@section('tubuh')
    
    <main class="form-signin w-100 m-auto text-center">
      <form action="/login" method="POST">
        @csrf
        
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        @if(session()->has('succes'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('succes') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif

        @if(session()->has('gagal'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif
    
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required>
          <label for="email">Email address</label>
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    
   
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
      </form>
      <small>Belum Regis? <a href="/register">Klik Disini</a></small>
    </main>


@endsection