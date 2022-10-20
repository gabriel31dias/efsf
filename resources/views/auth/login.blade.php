@extends('layouts.app')
@section('content')
<div class="page page-center flex">

   <div class="grid lg:grid-cols-3">

      <div class="lg:block hidden lg:col-span-2 h-48  min-h-screen relative overflow-hidden bg-gray-400 shadow-2xl" >
         <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('static/bg-digital.jpg') }}" />
      </div>

   <div class="lg:col-span-1 mx-auto container-tight lg:py-4 ">
      <div class="text-center px-2 mb-4 grid">
         <img class="w-14 justify-self-end" src="{{ asset('static/amapa.png') }}" alt="">
         <img class="w-28 justify-self-center mt-10" src="{{ asset('static/pca.png') }}" alt="">
         <span class="font-bold text-3xl"> SISTEMA DE IDENTIFICAÇÃO CIVIL  </span>
      </div>
      <form method="POST" action="{{ route('login.auth') }}" class="card " action="." autocomplete="off">
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
               <span class="form-check-label">Manter-me conectado</span>
               </label>
            </div>
            <div class="grid form-footer">
               <button type="submit" class="btn btn-primary bg-sky-800 rounded-full w-3/5 justify-self-center ">Entrar</button>
            </div>
         </div>
      </form>
   </div>
</div>

</div>
@endsection
