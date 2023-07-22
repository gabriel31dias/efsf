<div class="page-wrapper">
    <div class="container-fluid">
       <!-- Page title -->
       <div class="page-header d-print-none">
          <div class="row g-2 align-items-center">
             <div class="col">
                <h2 class="page-title">
                    CÉDULAS EMITIDAS
                    @if($type == 1)
                        EM LOTE
                    @endif
                    @if($type == 2)
                     DE FORMA AVULSA
                    @endif
                </h2>
             </div>
          </div>
       </div>
    </div>
    <div class="col-12 col-md-auto ms-auto d-print-none">
       <div class="btn-list">
        <span class="d-none d-sm-inline">
            <div x-data="{ open: false }" class="dropdown">
               <button @click="$('#xx').toggleClass('show')" class="btn btn-secondary bg-gray-600 dropdown-toggle"
                  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  Filtrar status
               </button>
               <div id="xx" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a  class="dropdown-item"><input style="margin:1%" wire:click="setFilterFaceA(true)" type="checkbox" name=""
                        id="">Face A</a>
                  <a class="dropdown-item"><input style="margin:1%" wire:click="setFilterFaceB(true)" type="checkbox" name=""
                        id="">Face B</a>
               </div>
            </div>
         </span>
        @can('permission', 'director-signature.create')
          <a wire:click="create" class="btn btn-primary items-center inline-flex" data-bs-toggle="modal"
             data-bs-target="#modal-report">
             <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
             <svg class="hidden lg:block" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
             </svg>
             Criar Cédula
          </a>
       </div>
       @endcan
    </div>
    <div class="page-body">
       <div class="container_fluid">

          <div class="container-fluid" class="input-icon">
             <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                <svg wire:click="goUnit()" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                   stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                   <circle cx="10" cy="10" r="7"></circle>
                   <line x1="21" y1="21" x2="15" y2="15"></line>
                </svg>
             </span>
             <input wire:model="searchTerm" type="text" value="" class="form-control" placeholder="Pesquisar.."
                aria-label="Search in website">
          </div>
          <br>
          <div class="card">
             <div class="card-body">
                <div id="table-default" class="table-responsive">
                   <table class="table">
                      <thead>
                         <tr>
                            <th><button class="table-sort" >Nome Servidor</button></th>
                            <th><button class="table-sort" >Cédulas</button></th>
                            <th><button class="table-sort" >Posto de atendimento</button></th>
                            <th><button class="table-sort" >Data criação</button></th>
                         </tr>
                      </thead>
                      <tbody class="table-tbody">


                         @foreach ($items as $item)
                            <tr >
                                <td wire:click="clickUpdate({{$item->id}})" >{{ $item->user->name }}</td>
                                <td wire:click="clickUpdate({{$item->id}})">
                                    @if($item->error)
                                     <p style="color: red">{{ $item->stringBallots }}</p>
                                    @else
                                     {{ $item->stringBallots }}
                                    @endif
                                </td>
                                <td wire:click="clickUpdate({{$item->id}})">{{ $item->serviceStation->service_station_name }}</td>
                                <td wire:click="clickUpdate({{$item->id}})">{{ $item->date_inactive }}</td>
                            </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
                {{ $items->links() }}
             </div>
          </div>

       </div>
    </div>
