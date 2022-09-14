<div class="page-wrapper">
<div class="container-fluid">
   <!-- Page title -->
   <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
         <div class="col">
            <h2 class="page-title">
               Servidores
            </h2>
         </div>
      </div>
   </div>
</div>
<div class="col-12 col-md-auto ms-auto d-print-none">
   <div class="btn-list">
    <span class="d-none d-sm-inline">
     <div x-data="{ open: false }" class="dropdown">
        <button @click="$('.dropdown-menu').toggleClass('show')" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Filtrar status
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" ><input style="margin:1%" wire:model="filterActives" type="checkbox" name="" id="">Ativos</a>
            <a class="dropdown-item" ><input style="margin:1%" wire:model="filterInactives" type="checkbox" name="" id="">Inativos</a>
            <a class="dropdown-item" ><input style="margin:1%" wire:model="filterUnlockeds" type="checkbox" name="" id="">Desbloqueados</a>
            <a class="dropdown-item" ><input style="margin:1%" wire:model="filterBlockeds" type="checkbox" name="" id="">Bloquedos</a>
        </div>
    </div>

      </span>
      <a  wire:click="addUser" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
         <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
         </svg>
         Criar novo servidor
      </a>
      <a href="/dwdwdw" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
         <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
         </svg>
      </a>
   </div>
</div>
<div class="page-body">
   <div class="container_fluid">
      <div class="container-fluid" class="input-icon">
         <span class="input-icon-addon">
            <!-- Download SVG icon from http://tabler-icons.io/i/search -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <circle cx="10" cy="10" r="7"></circle>
               <line x1="21" y1="21" x2="15" y2="15"></line>
            </svg>
         </span>
         <input wire:model="searchTerm" type="text" value="" class="form-control" placeholder="Pesquisar.."
               >
      </div>

      <br>
      <div class="card">
         <div class="card-body">
            <div id="table-default" class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>
                           Nome
                        </th>

                        <th>
                            Cpf
                        </th>

                        <th>
                            Celular
                        </th>

                        <th>
                            Endereço
                        </th>

                        <th>
                            Cep
                        </th>

                        <th>
                            Bairro
                        </th>

                        <th>
                            Cidade
                        </th>

                     </tr>
                  </thead>
                  <tbody class="table-tbody">
                    @foreach ($users as $user)
                     <tr  wire:click="clickUpdate({{$user->id}})">
                        <td class="sort-name">{{$user->name}}</td>
                        <td class="sort-city">{{$user->cpf}}</td>
                        <td class="sort-type">{{$user->cell}}</td>
                        <td class="sort-score">{{$user->address}}</td>
                        <td class="sort-date" data-date="1628122643">{{$user->zip_code}}</td>
                        <td class="sort-quantity">{{$user->district}}</td>
                        <td class="sort-quantity">{{$user->city}}</td>
                       </tr>
                    @endforeach

                  </tbody>
               </table>

            </div>
            {{ $users->links() }}
         </div>
      </div>
   </div>
</div>
