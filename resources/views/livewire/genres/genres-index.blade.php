<div class="page-wrapper">
    <div class="container-fluid">
       <!-- Page title -->
       <div class="page-header d-print-none">
          <div class="row g-2 align-items-center">
             <div class="col">
                <h2 class="page-title">
                    GÊNEROS
                </h2>
             </div>
          </div>
       </div>
    </div>
    <div class="col-12 col-md-auto ms-auto d-print-none">
       <div class="btn-list">
          <span class="d-none d-sm-inline">
            <div x-data="{ open: false }" class="dropdown">
                <button  @click=" $('#xx').toggleClass('show')" class="btn btn-secondary bg-gray-500 dropdown-toggle filter" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Filtrar status
                </button>
                <div id="xx"  class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" ><input style="margin:1%" wire:model="filterActives" type="checkbox" name="" id="">Ativos</a>
                    <a class="dropdown-item" ><input style="margin:1%" wire:model="filterInactives" type="checkbox" name="" id="">Inativos</a>
                </div>
            </div>
          </span>
          <a  wire:click="addGender" class="btn btn-primary inline-flex" data-bs-toggle="modal" data-bs-target="#modal-report">
             <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
             </svg>
             Criar novo genero
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
                                name
                            </th>
                         </tr>
                      </thead>
                      <tbody class="table-tbody">
                        @foreach ($genres as $genre)
                         <tr  wire:click="clickUpdate({{$genre['id']}})">
                            <td class="sort-name">{{$genre['name']}}</td>
                         </tr>
                        @endforeach
                      </tbody>
                   </table>
                </div>
                {{ $genres->links() }}
             </div>
          </div>
       </div>
    </div>
