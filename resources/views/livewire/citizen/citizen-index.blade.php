<div class="page-wrapper">
    <div class="container-fluid">
       <!-- Page title -->
       <div class="page-header d-print-none">
          <div class="row g-2 align-items-center">
             <div class="col">
                <h2 class="page-title">
                    Cidadão
                </h2>
             </div>
          </div>
       </div>
    </div>
    <div class="col-12 col-md-auto ms-auto d-print-none">
       <div class="btn-list">
          <span class="d-none d-sm-inline">
            <div x-data="{ open: false }" class="dropdown">
                <button  @click=" $('.dropdown-menu').toggleClass('show')" class="btn btn-secondary dropdown-toggle filter" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Filtrar status
                </button>
                <div  class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" ><input style="margin:1%" wire:model="filterActives" type="checkbox" name="" id="">Ativos</a>
                    <a class="dropdown-item" ><input style="margin:1%" wire:model="filterInactives" type="checkbox" name="" id="">Inativos</a>
                </div>
            </div>
          </span>
          <a  wire:click="addCitizen" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
             <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
             </svg>
             Criar novo cidadão
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
                                <input style="width: 100%" wire:model="perfilName" placeholder="Nome" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
                            </th>

                            <th>
                                <input style="width: 100%" wire:model="daysToAccessInspiration" placeholder="Cpf" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
                            </th>

                            <th>
                                <input style="width: 100%" wire:model="daysToActivityLock" placeholder="Rg" maxlength="70" type="text" class="form-control" autocomplete="off" required="">
                           </th>
                         </tr>
                      </thead>
                      <tbody class="table-tbody">
                        @foreach ($citizens as $citizen)
                         <tr  wire:click="clickUpdate({{$profile['id']}})">
                            <td class="sort-name">{{$citizen['name']}}</td>
                            <td class="sort-name">{{$citizen['cpf']}}</td>
                            <td class="sort-name">{{$citizen['rg']}}</td>
                         </tr>
                        @endforeach
                      </tbody>
                   </table>
                </div>

             </div>
          </div>
       </div>
    </div>
