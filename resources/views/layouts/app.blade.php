<!doctype html>
<!--
   * Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
   * @version 1.0.0-beta11
   * @link https://tabler.io
   * Copyright 2018-2022 The Tabler Authors
   * Copyright 2018-2022 codecalm.net Paweł Kuna
   * Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
   -->
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
   <meta http-equiv="X-UA-Compatible" content="ie=edge" />
   <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
   <!-- CSS files -->
   <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
   @livewireStyles
   <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet" />
   <link href="./dist/css/demo.min.css" rel="stylesheet" />
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <script type="text/javascript" src="{{ asset('dist/js/mask.js') }}"></script>
   <script type="text/javascript" src="{{ asset('dist/js/cep.js') }}"></script>
   <script type="text/javascript" src="{{ asset('dist/js/password_chang.js') }}"></script>


   <script type="text/javascript" src="{{ asset('dist/js/modal_chang_expired_pass.js') }}"></script>

   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet">
   <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet">
   <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet">

   <script src="./dist/js/demo.min.js?1661943614" defer></script>
   <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet">
   <script data-turbolinks-track="reload" src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
   <script data-turbolinks-track="reload" src="./dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
   <script data-turbolinks-track="reload" src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
   <script data-turbolinks-track="reload" src="./dist/libs/jsvectormap/dist/maps/world.js" defer></script>
   <script data-turbolinks-track="reload" src="./dist/libs/jsvectormap/dist/maps/world-merc.js" defer></script>
   <script src="https://unpkg.com/imask"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
   <meta name="turbolinks-visit-control" content="reload">
   <script src="//unpkg.com/alpinejs" defer></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"
      integrity="sha512-c4FE2uNeKCAtchLEpO9yimL8CuifrlEMnORyTNw0TAkGqYpqADT8qX/DG/ASy+F29KUSgEgrPidbNPENW17QFQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.ui.position.js"></script>

   @livewireScripts
   <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js"
      integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
      data-turbolinks-eval="false" data-turbo-eval="false"></script>
   @vite('resources/js/app.js')

   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>

<body>
   @if(Auth::check())
   <header class="navbar navbar-expand-md navbar-light d-print-none">
      <div class="container-fluid">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
         </button>
         <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
               <img src="./static/logo.svg" alt="Tabler" class="navbar-brand-image" width="110" height="32">
            </a>
         </h1>
         <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item d-none d-md-flex me-3">
               <div class="btn-list">

               </div>
            </div>
            <div class="d-none d-md-flex">
               <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip"
                  data-bs-placement="bottom" aria-label="Enable dark mode">
                  <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                  </svg>
               </a>
               <a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip"
                  data-bs-placement="bottom" aria-label="Enable light mode">
                  <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <circle cx="12" cy="12" r="4"></circle>
                     <path
                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7">
                     </path>
                  </svg>
               </a>
            @livewire('global.modal-select-service-station')

               <div class="nav-item dropdown d-none d-md-flex me-3">
                  <a  onclick="setVisualizedItems()" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                     aria-label="Show notifications">
                     <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                           d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                        </path>
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                     </svg>
                     <span class="badge bg-red"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card " data-bs-popper="static">
                  <div class="card">
                    <div class="card-header">
                    
                      <h3 class="card-title">Notificações {{ auth()->user()->userStations }}</h3>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">

                  

                    @php
                      $notifications = (new App\Http\Services\GetNotifications())->call(['user_id_receive' =>  Auth::user()->id, 'service_stations' => auth()->user()->userStations->toArray() ])['notifications']
                    @endphp

                    @foreach($notifications as $item)
                    
                     @if($item->visualid == false)
                      <div  class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto">
                         
                          @if($item->type == 1)
                              <span class="status-dot status-dot-animated bg-red d-block">
                          @endif

                          @if($item->type == 2)
                              <span class="status-dot status-dot-animated bg-green d-block">
                          @endif
                          
                          </span></div>
                          <div class="col text-truncate">
                            <a href="{{$item->resolution_url}}" class="text-body d-block">{{$item->title}}</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                             {{$item->content}}
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      @else  
                      <div  class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot "></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">{{$item->title}}</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                             {{$item->content}}
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                     @endif


                    
                    
                     @endforeach
  
                    </div>
                  </div>
                </div>

               </div>
               <div class="nav-item dropdown d-none d-md-flex me-3">
                  <a href="#" onclick="Turbolinks.visit('/logout')" class="nav-link px-0" data-bs-toggle="dropdown"
                     tabindex="-1" aria-label="Show notifications">
                     <!-- Download SVG icon from http://tabler-icons.io/i/bell -->

                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                        </path>
                        <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                     </svg>
                  </a>

               </div>
            </div>



            <div class="nav-item dropdown">
               <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                  aria-label="Open user menu">
                  <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                  <div class="d-none d-xl-block ps-2">
                     <div>{{Auth::user()->email ?? ''}} </div>
                     <div class="mt-1 small text-muted">{{Auth::user()->name ?? ''}}</div>
                  </div>
               </a>
               <div id="options-menu" style="display: " class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

               </div>
            </div>
         </div>
      </div>
   </header>

   <div class="page p-10">
      <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
         <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
               <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="" style="text-align:center;">
               <div class="bg-sky-800 pt-2">
                  <div class="relative ">
                     <a class="text-decoration-none shadow-lg" href="#">
                        <div class="flex px-4 items-center">
                           <img class="w-8 mx-8" src="{{ asset('static/pca.png') }}" alt="">
                           <h2 style="color: white" class="text-xl font-bold mt">SIC</h2>
                        </div>
                  </div>
               </div>

               <div class="h-4" style="overflow: hidden;">
                  <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                     <path class="fill-sky-800"
                        d="M0.00,92.27 C216.83,192.92 304.30,8.39 500.00,109.03 L500.00,0.00 L0.00,0.00 Z"
                        style="stroke: none;"></path>
                  </svg>
               </div>
               </a>

            </h1>
            <div class="navbar-nav flex-row d-lg-none">
               <div class="nav-item d-none d-lg-flex me-3">
                  <div class="btn-list">
                     <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                           <path
                              d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                        </svg>
                        Source code
                     </a>
                     <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24"
                           viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                           <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        Sponsor
                     </a>
                  </div>
               </div>
               <div class="d-none d-lg-flex">
                  <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                     data-bs-toggle="tooltip" data-bs-placement="bottom">
                     <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                     </svg>
                  </a>
                  <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                     data-bs-toggle="tooltip" data-bs-placement="bottom">
                     <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="4" />
                        <path
                           d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                     </svg>
                  </a>
                  <div class="nav-item dropdown d-none d-md-flex me-3">
                     <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                           <path
                              d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                           <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        </svg>
                        <span class="badge bg-red"></span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Last updates</h3>
                           </div>
                           <div class="list-group list-group-flush list-group-hoverable">



                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
               <ul class="navbar-nav pt-lg-3">
                  <li class="nav-item">
                     <a class="nav-link" href="/">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <i class="ti ti-home"></i>
                        </span>
                        <span class="nav-link-title">
                           Home
                        </span>
                     </a>
                  </li>

                  @livewire('global.menu-item',
                  [
                  'title' => 'Cadastro de Servidores',
                  'classIcon' => 'ti ti-user-circle',
                  'href' => route('users.index'),
                  'can' => 'users.index'
                  ])


                  @livewire('global.menu-item',
                  [
                  'title' => 'Cadastro de Perfis',
                  'classIcon' => 'ti ti-user',
                  'href' => route('profile.index'),
                  'can' => 'profile.index'
                  ])

                  @livewire('global.menu-item',
                  [
                  'title' => 'Consultar Cidadão',
                  'classIcon' => 'ti ti-accessible',
                  'href' => route('citizen.index'),
                  'can' => 'citizen.index'
                  ])

                  @livewire('global.menu-item',
                  [
                  'title' => 'Cadastro de Gêneros',
                  'classIcon' => 'ti ti-gender-transgender',
                  'href' => route('genres.index'),
                  'can' => 'genre.index'
                  ])


                  @can('permission', 'locale.index')
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                           <i class="ti ti-location"></i>
                        </span>
                        <span class="nav-link-title">
                           Cadastro de Localidades
                        </span>
                     </a>
                     <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                           <div class="dropdown-menu-column">
                              <a class="dropdown-item" href='{{ route('county.index') }}'>
                                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <i class="ti ti-plus"></i>


                                 </span>
                                 <span class="nav-link-title">
                                    Cadastro de Município
                                 </span>
                              </a>
                              <a class="dropdown-item" href='{{ route('uf.index') }}'>
                                 <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <i class="ti ti-plus"></i>


                                 </span>
                                 <span class="nav-link-title">
                                    Cadastro de Estado
                                 </span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </li>
                  @endcan

                  @livewire('global.menu-item',
                  [
                  'title' => 'Cadastro de Características',
                  'classIcon' => 'ti ti-eyeglass',
                  'href' => route('feature.index'),
                  'can' => 'feature.index'
                  ])


                  <li class="nav-item">
                     <a class="nav-link" href='{{ route('unit.index') }}'>
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                           <i class="ti ti-home-2"></i>
                        </span>

                        <span class="nav-link-title">
                           Cadastro de unidades
                        </span>
                     </a>
                  </li>


                  @livewire('global.menu-item',
                  [
                  'title' => 'Cadastro de Postos de Atendimento',
                  'classIcon' => 'ti ti-building-arch',
                  'href' => route('service-station.index'),
                  'can' => 'station.index'
                  ])


                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                           <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                           <i class="ti ti-plus"></i>
                        </span>
                        <span class="nav-link-title">
                           Cadastro de Cartório
                        </span>
                     </a>
                     <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                           <div class="dropdown-menu-column">

                              @livewire('global.menu-item',
                              [
                              'title' => 'Novo Cartório',
                              'classIcon' => 'ti ti-certificate',
                              'href' => route('registry.index'),
                              'can' => 'registry.index',
                              'is_dropdown' => true
                              ])

                              @livewire('global.menu-item',
                              [
                              'title' => 'Transferência de Cartório',
                              'classIcon' => 'ti ti-arrows-left-right',
                              'href' => route('registry-transfer.index'),
                              'can' => 'transfer.index',
                              'is_dropdown' => true
                              ])

                              @livewire('global.menu-item',
                              [
                              'title' => 'Interdição de Cartório',
                              'classIcon' => 'ti ti-ban',
                              'href' => route('registry-interdiction.index'),
                              'can' => 'interdiction.index',
                              'is_dropdown' => true
                              ])

                              @livewire('global.menu-item',
                              [
                              'title' => 'Suspensão de Certidão',
                              'classIcon' => 'ti ti-ban',
                              'href' => route('registry-suspension.index'),
                              'can' => 'suspension.index',
                              'is_dropdown' => true
                              ])

                              @livewire('global.menu-item',
                              [
                              'title' => 'Bloqueio de Certidão',
                              'classIcon' => 'ti ti-ban',
                              'href' => route('blocked-certificate.index'),
                              'can' => 'blocked.index',
                              'is_dropdown' => true
                              ])

                           </div>
                        </div>
                     </div>
                  </li>

                  @livewire('global.menu-item',
                  [
                    'title' => 'Processos',
                    'classIcon' => 'ti  ti-timeline-event-text',
                    'href' => route('process.index'),
                    'can' => 'process.index',
                  ])
                  @endif

               </ul>
            </div>
         </div>


      </aside>
      @yield('content')
   </div>
   <!-- Libs JS -->

   <script>
      @if(Auth::check())

        if("{{session('updatePass')}}" == "true" || "{{session('firstAccess')}}" == "true"){
            passwordExpiredChangModal('{{Auth::user()->id ?? ""}}')
        }

       @endif

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 5000,
        timerProgressBar:true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert',({detail:{type,message}})=>{
        var myForm = document.querySelector("form");
        if(myForm){
            myForm.checkValidity()
        }

        Toast.fire({
            icon:type,
            title:message
        })
    })

    window.addEventListener('editPassword',({detail:{user}})=>{
        passwordChangModal(user)
    })

    function setVisualizedItems(){
      const data = {
         user_id: userId,
      };

      const config = {
         headers: {
            'Content-Type': 'application/json',
         },
      };

      axios.post('/notifications', data, config)
      .then(response => {
         console.log(response.data);
      })
      .catch(error => {
         console.error(error);
      });
    }



    window.addEventListener('redirect',({detail:{url, delay}})=>{
        setTimeout(() => {
            Turbolinks.visit(url)
        }, delay);
    })

    document.addEventListener('turbolinks:load', () =>
        window.livewire.start()
    );


    window.addEventListener('changed_indicador_social',({detail:{user}})=>{


        if( document.querySelector('.pis_pasep')){

            var cpfMask = IMask(
                document.querySelector('.pis_pasep'), {
                mask: '00000000000'
            });
        }

        if( document.querySelector('.nis')){
            var cpfMask = IMask(
                document.querySelector('.nis'), {
                mask: '00000000000-00'
            });
        }



        if( document.querySelector('.nit')){
            var cpfMask = IMask(
                document.querySelector('.nit'), {
                mask: '00000000000-00'
            });
        }
    })




   </script>

</body>

</html>
