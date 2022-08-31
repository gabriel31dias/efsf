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
      <a wire:click="openFilters" href="#" class="btn btn-white">
      Filtros
      </a>
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
      </div>
      <br>
      <div class="card">
         <div class="card-body">
            <div id="table-default" class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th>
                            <input style="width: 100%" wire:model="searchName" placeholder="Nome" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
                        </th>

                        <th>
                            <input style="width: 100%" wire:model="searchCpf" placeholder="Cpf" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
                       </th>

                        <th>
                            <input style="width: 100%" wire:model="searchCelular" placeholder="Celular" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
                       </th>

                        <th>
                            <input style="width: 100%"  wire:model="searchEndereco" placeholder="Endereço" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
                        </th>

                        <th>
                            <input style="width: 100%" wire:model="searchCep" placeholder="Cep" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
                        </th>

                        <th>
                            <input style="width: 100%" wire:model="searchDistrict" placeholder="Bairro" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
                        </th>

                        <th>
                            <input style="width: 100%" wire:model="searchCity" placeholder="Cidade" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
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
                        <td class="sort-date" data-date="1628122643">{{$user->cep}}</td>
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
