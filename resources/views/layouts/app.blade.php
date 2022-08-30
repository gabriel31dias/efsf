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
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
      <!-- CSS files -->
      <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
      @livewireStyles
      <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
      <link href="./dist/css/demo.min.css" rel="stylesheet"/>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet">
      <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet">
      <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet">
      <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet">
      <script data-turbolinks-track="reload"  src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      <script  data-turbolinks-track="reload" src="./dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
      <script data-turbolinks-track="reload" src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
      <script data-turbolinks-track="reload" src="./dist/libs/jsvectormap/dist/maps/world.js" defer></script>
      <script data-turbolinks-track="reload" src="./dist/libs/jsvectormap/dist/maps/world-merc.js" defer></script>

      <meta name="turbolinks-visit-control" content="reload">

      @livewireScripts
      <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
      <script defer src="{{ asset('js/app.js') }}"></script>
      <script defer src="{{ asset('css/app.css') }}"></script>
   </head>
   <body >

      <div class="page">

        @if(Auth::check())
         <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
            <div class="container-fluid">
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
               <span class="navbar-toggler-icon"></span>
               </button>
               <h1 style="text-align:center;background-color:#206bc4;  border-bottom-left-radius: 25px;" >
                  <a href=".">
                    <h2 style="color: white">Sic</h2>
                  </a>
               </h1>
               <div class="navbar-nav flex-row d-lg-none">
                  <div class="nav-item d-none d-lg-flex me-3">
                     <div class="btn-list">
                        <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                           <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                           </svg>
                           Source code
                        </a>
                        <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
                           <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                           </svg>
                           Sponsor
                        </a>
                     </div>
                  </div>
                  <div class="d-none d-lg-flex">
                     <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                     </a>
                     <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <circle cx="12" cy="12" r="4" />
                           <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                     </a>
                     <div class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                           <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
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
                                 <div class="list-group-item">
                                    <div class="row align-items-center">
                                       <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                       <div class="col text-truncate">
                                          <a href="#" class="text-body d-block">Example 1</a>
                                          <div class="d-block text-muted text-truncate mt-n1">
                                             Change deprecated html tags to text decoration classes (#29604)
                                          </div>
                                       </div>
                                       <div class="col-auto">
                                          <a href="#" class="list-group-item-actions">
                                             <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="list-group-item">
                                    <div class="row align-items-center">
                                       <div class="col-auto"><span class="status-dot d-block"></span></div>
                                       <div class="col text-truncate">
                                          <a href="#" class="text-body d-block">Example 2</a>
                                          <div class="d-block text-muted text-truncate mt-n1">
                                             justify-content:between ⇒ justify-content:space-between (#29734)
                                          </div>
                                       </div>
                                       Perfis        <div class="col-auto">
                                          <a href="#" class="list-group-item-actions show">
                                             <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>u
                                 <div class="list-group-item">
                                    <div class="row align-items-center">
                                       <div class="col-auto"><span class="status-dot d-block"></span></div>
                                       <div class="col text-truncate">
                                          <a href="#" class="text-body d-block">Example 3</a>
                                          <div class="d-block text-muted text-truncate mt-n1">
                                             Update change-version.js (#29736)
                                          </div>
                                       </div>
                                       <div class="col-auto">
                                          <a href="#" class="list-group-item-actions">
                                             <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="list-group-item">
                                    <div class="row align-items-center">
                                       <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                                       <div class="col text-truncate">
                                          <a href="#" class="text-body d-block">Example 4</a>
                                          <div class="d-block text-muted text-truncate mt-n1">
                                             Regenerate package-lock.json (#29730)
                                          </div>
                                       </div>
                                       <div class="col-auto">
                                          <a href="#" class="list-group-item-actions">
                                             <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                             </svg>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="nav-item dropdown">
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>Paweł Kuna</div>
                           <div class="mt-1 small text-muted">UI Designer</div>
                        </div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="#" class="dropdown-item">Set status</a>
                        <a href="#" class="dropdown-item">Profile & account</a>
                        <a href="#" class="dropdown-item">Feedback</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Logout</a>
                     </div>
                  </div>
               </div>
               <div class="collapse navbar-collapse" id="navbar-menu">
                  <ul class="navbar-nav pt-lg-3">
                     <li class="nav-item">
                        <a class="nav-link" href="./index.html" >
                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                              <i class="ti ti-home"></i>
                           </span>
                           <span class="nav-link-title">
                           Home
                           </span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link"   href='{{ route('users.index') }}'>
                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                              <i class="ti ti-user-circle"></i>
                           </span>
                           <span class="nav-link-title">
                           Cadastro de servidores
                           </span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href='{{ route('profile.index') }}' >
                           <span class="nav-link-icon d-md-none d-lg-inline-block">
                              <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                              <i class="ti ti-user"></i>


                           </span>
                           <span class="nav-link-title">
                           Cadastro de perfis
                           </span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>

            @endif
         </aside>
         @yield('content')
      </div>
      <!-- Libs JS -->

<script >
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

    window.addEventListener('openFilters',({})=>{
        alert("dw")
        goFilters()
    })

    window.addEventListener('redirect',({detail:{url, delay}})=>{
        setTimeout(() => {
            Turbolinks.visit(url)
        }, delay);
    })

    document.addEventListener('turbolinks:load', () =>
        window.livewire.start()
    );


    if(document.getElementById('phone')){
        document.getElementById('phone').addEventListener('keypress', function (e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{2})(\d{5})(\d{3})/);
            e.target.value = '(' + x[1] + ') ' + x[2] + '-' + x[3];
        });
    }




    function goFilters (){
        Swal.fire({
        title: '<strong>HTML <u>example</u></strong>',
        icon: 'info',
        html:
        'You can use <b>bold text</b>, ' +
        '<a href="//sweetalert2.github.io">links</a> ' +
        'and other HTML tags',
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText:
        '<i class="fa fa-thumbs-up"></i> Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText:
        '<i class="fa fa-thumbs-down"></i>',
        cancelButtonAriaLabel: 'Thumbs down'
    })
}
</script>

   </body>
</html>
