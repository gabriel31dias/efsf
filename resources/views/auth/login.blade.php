@extends('layouts.app')
@section('content')
<div class="page page-center">
   <div class="container-tight py-4">
      <div class="text-center mb-4">
         <a href="." class="navbar-brand navbar-brand-autodark"><img  height="100" alt=""></a>
      </div>
      <form method="POST" action="{{ route('login.auth') }}" class="card card-md" action="." autocomplete="off">
         <div class="card-body">
            <h2 class="card-title text-center mb-4">Logar no sistema</h2>
            <div class="mb-3">
               @csrf
               <label class="form-label">Usuário</label>
               <input id="user_name" type="user_name" class="form-control @error('email') is-invalid @enderror" name="user_name" value="{{ old('email') }}" required autocomplete="email" autofocus>
               @if(session()->has('message'))
               <span  role="alert">
                <strong style="color: RED">{{ session()->get('message') }}</strong>
               </span>
               @endif
            </div>
            <div class="mb-2">
               <label class="form-label">
               Senha
               <span class="form-label-description">
               </span>
               </label>
               <div class="input-group input-group-flat">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <span class="input-group-text">
                     <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                        <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <circle cx="12" cy="12" r="2" />
                           <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                        </svg>
                     </a>
                  </span>
               </div>
            </div>
            <div class="mb-2">
               <label class="form-check">
               <input type="checkbox" class="form-check-input"/>
               <span class="form-check-label">Remember me on this device</span>
               </label>
            </div>
            <div class="form-footer">
               <button type="submit" class="btn btn-primary bg-sky-600 w-100">Sign in</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
